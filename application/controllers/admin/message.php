<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Message extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* ----- Its function use to show all Worker list ----- */

    public function index() {
         
        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.user_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));

        $where = array('reciver_id' => $this->session->userdata('u_id'));
        $column_resp = array('message.*', 'concat(comp_person_gender, comp_person_name) as name', 'comp_person_image', 'title');

        $data['inbox'] = $this->user_model->get_joins('message', $where, $joins, $column_resp, NULL, NULL, 'msg_id  DESC');
    
        $this->user_model->updatedata('message', $where, array('status'=>'0'));
        
        //---Sent Message
        
        $joins = array(array('table' => 'user_profile',
                                'condition' => 'message.reciver_id=user_profile.p_u_id',
                                'jointype' => 'inner'),
                          array('table' => 'deals',
                                'condition' => 'message.deal_id=deals.id',
                                'jointype' => 'left'));
        $where = array('user_id' => $this->session->userdata('u_id'));
        $data['sent'] = $this->user_model->get_joins('message', $where, $joins, $column_resp, NULL, NULL, 'msg_id  DESC');
        $this->layout->view('admin/message_list_view', $data);
    }

    public function details($id, $type) {

        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.user_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));


        if ($type == "sent") {
            $where = array('user_id' => $this->session->userdata('u_id'));
            $data['type'] = "Receiver";
        } else {
            $where = array('reciver_id' => $this->session->userdata('u_id'));
            $data['type'] = "Sender";            
            $this->user_model->updatedata('message', array('msg_id' => $id), array('status'=>'0'));
        }

        $where = array('msg_id' => $id);
        $column_resp = array('message.*', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image', 'title');


        $data['msg'] = array_shift($this->user_model->get_joins('message', $where, $joins, $column_resp));

        $this->layout->view('admin/message_detail_view', $data);
    }

    public function send() {

        $joins = array(array('table' => 'user_profile', 'condition' => 'user_profile.p_u_id=users.u_id', 'jointype' => 'INNER'));
        $data['users'] = $this->user_model->get_joins('users', array('u_status' => '1'), $joins, array('concat(comp_person_gender,comp_person_name) as name','u_id'));

        if ($this->form_validation->run('messagesend') == FALSE) {
            $this->layout->view('admin/message_send_view', $data);
        } else {

            $message=$this->input->post();
            $message['date']= time();
            $message['user_id']= $this->session->userdata('u_id');
            
            $uid = $this->user_model->insertdata('message', $message);
            $data['success'] = 'well done';
           
            //redirect(site_url() . 'admin/deals/index');
             $this->layout->view('admin/message_send_view', $data);
            
           
        }
    }

}

?>
