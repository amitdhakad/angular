<?php

require APPPATH . 'core/' . $CFG->config['subclass_prefix'] . 'Home.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('u_type') == "2" && $this->session->userdata('logged_in'))
            redirect(site_url() . 'cityadmin/');
    }

    /*     * ******************
     * User Profile Section  
     * *********************** */

    public function index() {
        $this->load->view("template/home");
    }
 
    


    public function password() {
        $this->load->view("password_view");
    }

    public function pass_update() {
        $msg = array();
        $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE) {
            //$msg=validation_errors();
            $msg['msg'] = "Input Values not valid !! ";
            $msg['type'] = 'error';
        } else {
            $where = array('u_id' => $this->session->userdata('u_id'),
                'u_password' => md5($this->input->post('oldpass')));
            $result = $this->user_model->user_details($where);
            if ($result) {
                $this->user_model->UPDATEDATA('users', $where, array('u_password' => md5($this->input->post('password'))));
                $msg['msg'] = 'Password Successfully Updated !!';
                $msg['type'] = 'success';
            } else {
                $msg['msg'] = "Old Password Is not Valid !!";
                $msg['type'] = 'error';
            }
        }
        print_r(json_encode($msg));
    }

    /*     * **************
     * Handeled Deal Reply(Query) Functionality Section 
     * ******************************* */

    public function adddeal() {
        $data['users'] = $this->user_model->user_details(array('u_status' => '1', 'u_id !=' => $this->session->userdata('u_id')), 'comp_person_name ASC');
        $this->load->view("add_deals_view", $data);
    }

    public function add_deal() {
        if ($this->input->post()) {
            if ($this->form_validation->run('deals') == FALSE) {
                print_r(validation_errors());
                $msg['msg']=validation_errors();
                $msg['type']='error';
                
            } else {
                $file='';
                $deals = $this->input->post();
                unset($deals['doc_file']);
                
                $deals['customer_id'] = $this->session->userdata('u_id');

                $url_routes = preg_replace('/[^a-zA-Z0-9 ]/s ', '', $this->input->post('title'));
                $url_routes = str_replace(' ', '-', $url_routes) . random_string('alnum', 16);
                $deals['slug'] = $url_routes;

                $deals['date'] = time();
                
                $file['deal_id'] = $this->user_model->insertdata('deals', $deals);     
                   
                
                foreach ($this->input->post('doc_file') as $files){
                   $file['file_name']=$files;
                  $this->user_model->insertdata('deal_files', $file);
                  //print_r($file);
                  $msg['msg']='Well done SuccessFully Added!!';
                   $msg['type']='success';
                }
                
                
                print_r($msg);
            }
        }
    }

    
     public function deal_update() {
        if ($this->input->post()) {
            $deals['title'] = $this->input->post('title');
            $deals['assign_to'] = $this->input->post('assign_to');
            $deals['budget'] = $this->input->post('budget');
            $deals['description'] = $this->input->post('description');            
            
           //$deals['doc_file'] = $this->input->post('doc_file');
            
            $deals['status'] = $this->input->post('status');
            $deals['search_keyword'] = $this->input->post('search_keyword');
            $url_routes = preg_replace('/[^a-zA-Z0-9 ]/s ', '', $this->input->post('title'));
            $url_routes = str_replace(' ', '-', $url_routes) . '_' . random_string('alnum', 16);
            //$deals['slug'] = $url_routes;
            $this->user_model->UPDATEDATA('deals', array('id' => $this->input->post('dealsid')), $deals);
            
            
            $file['deal_id'] = $this->input->post('dealsid'); 
            if(@$this->input->post('doc_file')){
            foreach ($this->input->post('doc_file') as $files){
                   $file['file_name']=$files;
                  $this->user_model->insertdata('deal_files', $file);
                }
            }
            
        }
    }
    
    public function deals_view() {
        $this->load->view("deals_view");
    }

    public function query($deal_id, $your_deal = '', $query_id = '') {
        $joins_query = array(array('table' => 'user_profile',
                'condition' => 'query.user_id=user_profile.p_u_id',
                'jointype' => 'inner'
        ));

        if ($query_id)
            $where = array('query_id' => $query_id);
        else if ($your_deal)
            $where = array('deal_id' => $deal_id);
        else
            $where = array('deal_id' => $deal_id, 'query.user_id' => $this->session->userdata('u_id'));

        $column = array('date', 'query_id', 'query', 'comp_person_image', 'concat(comp_person_gender,comp_person_name) as name', 'query_id as reply_list');
        $data = $this->user_model->get_joins('query', $where, $joins_query, $column, NULL, NULL, 'query_id  DESC');
        foreach ($data as &$nwdata) {
            $joins_query_resp = array(array('table' => 'user_profile',
                    'condition' => 'query_response.user_id=user_profile.p_u_id',
                    'jointype' => 'inner'));
            $where_resp = array('query_id' => $nwdata->query_id);
            $column_resp = array('date', 'query_id', 'response', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image');
            $nwdata->reply_list = $this->user_model->get_joins('query_response', $where_resp, $joins_query_resp, $column_resp, NULL, NULL, 'response_id  ASC');
        }
        return $data;
    }

    public function deals($id = '') {
        
        
        if ($id) {
            $where = array('slug' => $id);
        } else {
            $where = "(assign_to = '0' or assign_to='" . $this->session->userdata('u_id') . "' ) and customer_id !='". $this->session->userdata('u_id')."' and status=1";
        }

        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.customer_id',
                'jointype' => 'inner'));
        $data = $this->user_model->get_joins('deals', $where, $join, array('deals.*', 'comp_person_name', 'comp_person_image'), NULL, NULL, 'id Desc');
       
        $deal = array();
        if ($id) {
            $deal['deal'] = array_shift($data);
            $deal['query'] = $this->query($deal['deal']->id);
            $deal['deal']->docfile=$this->user_model->get_joins('deal_files',array('deal_id'=>$deal['deal']->id));
            print_r(json_encode(($deal)));
        } else {
            print_r(json_encode($data));
        }
    }

    public function your_deal() {
        $where = array('customer_id' => $this->session->userdata('u_id'));
        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.customer_id',
                'jointype' => 'inner'));
        $data = $this->user_model->get_joins('deals', $where, $join, array('deals.*', 'comp_person_name', 'comp_person_image'), NULL, NULL, 'id Desc');
        print_r(json_encode($data));
    }

    public function your_deal_detail($id) {
        $where = array('slug' => $id,'customer_id' => $this->session->userdata('u_id'));
        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.customer_id',
                'jointype' => 'inner'),
            array('table' => 'user_profile as ass',
                'condition' => 'ass.p_u_id=deals.assign_to',
                'jointype' => 'left'));
        $data = $this->user_model->get_joins('deals', $where, $join, array('deals.*', 'user_profile.comp_person_name', 'user_profile.comp_person_image', 'ass.comp_person_name as assign_name'));

        $deal['deal'] = array_shift($data);
        if($deal['deal']){
            $deal['deal']->docfile=$this->user_model->get_joins('deal_files',array('deal_id'=>$deal['deal']->id)); 
            
            $deal['query'] = $this->query($deal['deal']->id, true);
            $this->user_model->UPDATEDATA('query', array('deal_id' => $deal['deal']->id), array('status' => '0'));
        }

        
        $deal['users'] = $this->user_model->user_details(array('u_status' => '1', 'u_id !=' => $this->session->userdata('u_id')), 'comp_person_name ASC');
        $this->load->view("your_deals_details_view", $deal);
    }

    public function your_deal_detail_data($id) {

        $where = array('slug' => $id,'customer_id' => $this->session->userdata('u_id'));
        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.customer_id',
                'jointype' => 'inner'),
            array('table' => 'user_profile as ass',
                'condition' => 'ass.p_u_id=deals.assign_to',
                'jointype' => 'left'));
        $data['deal'] = array_shift($this->user_model->get_joins('deals', $where, $join, array('title', 'budget', 'description', 'doc_file', 'deals.id as dealsid', 'status', 'assign_to', 'search_keyword', 'user_profile.comp_person_name', 'date', 'user_profile.comp_person_image', 'ass.comp_person_name as assign_name')));
        $data['deal']->docfile=$this->user_model->get_joins('deal_files',array('deal_id'=>$data['deal']->dealsid));        
       
        $data['query'] = $this->query($data['deal']->dealsid, true);
        
      // $data['users']=$this->user_model->user_details(array('u_status'=>'1','u_id !='=>$this->session->userdata('u_id')),'comp_person_name ASC');
        print_r(json_encode($data));
    }

   

    public function removefile() {     
        $data = json_decode(trim(file_get_contents('php://input')), true);
        $this->user_model->DELETEDATA('deal_files', $data);  
        echo '1';        
    }
    
    
    
    public function query_detail($query_id) {
        
         $where = array('query_id' => $query_id);
        $this->user_model->UPDATEDATA('query', $where, array('status' => '0'));
        
        $reulwhere=array('query_id' => $query_id,
                        'user_id !='=>$this->session->userdata('u_id'));             
        $this->user_model->UPDATEDATA('query_response',$reulwhere , array('status' => '0'));
        
        
        $data['query'] = $this->query(NULL, NULL, $query_id);
        $this->load->view("query_details_view", $data);
    }
    
    public function query_discussion($query_id){
        $joins_query_resp = array(array('table' => 'user_profile',
                    'condition' => 'query_response.user_id=user_profile.p_u_id',
                    'jointype' => 'inner'));
            $where_resp = array('query_id' => $query_id);
            $column_resp = array('date', 'query_id', 'response', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image');
            $nwd= $this->user_model->get_joins('query_response', $where_resp, $joins_query_resp, $column_resp, NULL, NULL, 'response_id  ASC');
            print_r(json_encode($nwd));
    }

    


    public function assigned() {
        $where = array('assign_to' => $this->session->userdata('u_id'));
        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.customer_id',
                'jointype' => 'inner'));
        $data = $this->user_model->get_joins('deals', $where, $join, array('deals.*', 'comp_person_name', 'comp_person_image'));
        print_r(json_encode($data));
    }

    public function deals_detils() {
        $this->load->view("deals_details_view");
    }

    public function send_query() {
        if ($this->input->post('query') != ' ' && $this->session->userdata('u_id') && $this->input->post()) {
            $column = array('user_id' => $this->session->userdata('u_id'),
                'deal_id' => $this->input->post('id'),
                'query' => $this->input->post('query'),
                'date' => time());
            $this->user_model->insertdata('query', $column);
            $data['message'] = "SuccessFully!!";
            $data['type'] = "success";
           
            $data['query'] = $this->query($this->input->post('id'));
        } else {
            $data['message'] = "Some Error!!";
            $data['type'] = "error";
            $data['query'] = '';
           
        }

        print_r(json_encode($data));
    }

    public function send_msg() {
        if ($this->input->post('msg') != ' ' && $this->input->post() && $this->session->userdata('u_id')) {

            if (!@$this->input->post('reciver_id')) {
                $reciver_id = array_shift($this->user_model->get_sql_select_data('deals', array('id' => $this->input->post('id')), array('customer_id')));
                $reciver_id = $reciver_id->customer_id;
            } else {
                $reciver_id = $this->input->post('reciver_id');
            }

            $column = array('user_id' => $this->session->userdata('u_id'),
                'deal_id' => @$this->input->post('id'),
                'reciver_id' => $reciver_id,
                'subject' => @$this->input->post('subject'),
                'message' => $this->input->post('msg'),
                'date' => time());
            $this->user_model->insertdata('message', $column);

            
            $data['message'] = "SuccessFully!!";
            $data['type'] = "success";
        } else {
           $data['message'] = "Some Error!!";
           $data['type'] = "error";
        }
        print_r(json_encode($data));
    }

    /* ---Its function use to Add Reply query Ans to datatabase--- */

    public function query_reply() {
        if ($this->input->post('queryreply') != ' ' && $this->input->post() && $this->session->userdata('u_id')) {

            $query_responce = array('query_id' => $this->input->post('queryid'),
                'user_id' => $this->session->userdata('u_id'),
                'response' => $this->input->post('queryreply'),
                'date' => time());
            $this->user_model->insertdata('query_response', $query_responce);
            $deal_id = array_shift($this->user_model->get_sql_select_data('query', array('query_id' => $this->input->post('queryid')), array('deal_id')));


            $data['message'] = "SuccessFully!!";
            $data['type'] = "success";
            $data['query'] = $this->query($deal_id->deal_id);
        } else {
             $data['message'] = "Some Error!!";
             $data['type'] = "error";
            $data['query'] = '';
        }

        print_r(json_encode($data));
    }

    public function reply_list($id) {
        if (!empty($id)) {
            $deal['query'] = $this->query($id);
            print_r(json_encode(($deal)));
        }
    }

    /*     * **************
     * Handeled  DealMessage  Functionality Section 
     * ******************************* */

    public function message() {
        $this->load->view('message_inbox_view');
    }

    //--Recive Message 
    public function inbox() {
        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.user_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));

        $where = array('reciver_id' => $this->session->userdata('u_id'));
        $column_resp = array('message.*', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image', 'title');

        $inbox = $this->user_model->get_joins('message', $where, $joins, $column_resp, NULL, NULL, 'msg_id  DESC');
        print_r(json_encode(($inbox)));
    }

    //---Sent messsage
    public function sent() {
        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.reciver_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));

        $where = array('user_id' => $this->session->userdata('u_id'));
        $column_resp = array('message.*', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image', 'title');

        $sent = $this->user_model->get_joins('message', $where, $joins, $column_resp, NULL, NULL, 'msg_id  DESC');
        print_r(json_encode(($sent)));
    }

    //---Message Details Controller
    public function details_message($msg_id, $type) {
        
        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.user_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));


        if ($type == "Sender") {
            $where = array('user_id' => $this->session->userdata('u_id'));
            $data['type'] = "Sender";
            $this->user_model->updatedata('message', array('msg_id' => $msg_id), array('status'=>'0'));
        } else {
            $where = array('reciver_id' => $this->session->userdata('u_id'));
            $data['type'] = "Receiver";
        }

        $where = array('msg_id 	' => $msg_id);
        $column_resp = array('message.*', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image', 'deals.slug','title');


        $data['msg'] = array_shift($this->user_model->get_joins('message', $where, $joins, $column_resp));

        $this->load->view('message_detail_view', $data);
    }

    //---compose_message View
    public function compose_message() {
        $data['users'] = $this->user_model->user_details(array('u_status' => '1', 'u_id !=' => $this->session->userdata('u_id')), 'comp_person_name ASC');

        $this->load->view("compose_message_view", $data);
    }

    /*     * *************
     * File Upload Function 
     * *********************** */

    public function upload_file() {      
        $name = '';
        $this->load->library('upload');
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = '*';
        $this->upload->initialize($config);
        $type='error';

        if (!$this->upload->do_upload('userfile')) {
            $status = $this->upload->display_errors('', '');
        } else {
            $uploads = array($this->upload->data('userfile'));
            foreach ($uploads as $key => $value) {
                $randomcode = random_string('alnum', 16);
                $newimagename = $randomcode . $value['file_ext'];
                rename($value['full_path'], $uploads[0]['file_path'] . $newimagename);
                $name = $deals['doc_file'] = $newimagename;
                $status = 'Successfully Upload!!';
                $type='success';
            }
        }

        echo json_encode(array('name' => $name, 'msg' => $status,'type'=>$type));
    }

    
    public function alert() {
        if ($this->session->userdata('u_id')) {
            $data['message'] = $this->user_model->message();
          
            $query = $this->user_model->query_alert($this->session->userdata('u_id'));
            $replyalert = $this->user_model->replyalert();
            //echo $this->db->last_query();
            //die;
            $data['query'] = array_merge($query, $replyalert);            
            print_r(json_encode($data));
        }else{
            $data['message']='';
            $data['query']='';
            print_r(json_encode($data));
        }
    }

}

?>
