<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Deals extends MY_Controller {

    public function __construct() {
        parent::__construct();
    }

    /* ----- Its function use to show all Worker list ----- */

    public function index() {
        $join = array(array('table' => 'user_profile',
                'condition' => 'user_profile.p_u_id=deals.assign_to',
                'jointype' => 'left'),
            array('table' => 'user_profile as dadmin',
                'condition' => 'dadmin.p_u_id=deals.customer_id',
                'jointype' => 'left'));
        $data['deals'] = $this->user_model->get_joins('deals', NULL, $join, array('deals.*', 'user_profile.comp_person_name','dadmin.comp_person_name as dealadmin','dadmin.p_u_id'), NULL, NULL, 'id Desc');


        //$data['deals'] = $this->user_model->get_sql_select_data('deals', NULL, NULL, NULL, 'id Desc');
        $this->layout->view('admin/deals_list', $data);
    }

    /* ---- Its function use to Add new Deal ------ */

    public function add() {

        //$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        if ($this->form_validation->run('deals') == FALSE) {
            $this->layout->view("admin/deals_add_view");
        } else {

            $deals = $this->input->post();           
            $deals['customer_id'] = $this->session->userdata('u_id');
            
            $url_routes = preg_replace('/[^a-zA-Z0-9 ]/s ', '', $this->input->post('title'));
            $url_routes = str_replace(' ', '-', $url_routes) . random_string('alnum', 16);
            $deals['slug'] = $url_routes;
            
            $deals['date'] = time();
            $file['deal_id'] = $this->user_model->insertdata('deals', $deals);
            
            
             /* --file upload---- */
            $this->load->library('upload');
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
           
            $this->upload->initialize($config);
            if ($this->upload->do_multi_upload("userfile")){
                foreach ($this->upload->get_multi_upload_data() as $key => $value) {
                    $randomcode = random_string('alnum', 16);
                    $newimagename = $randomcode . $value['file_ext'];
                    rename($value['full_path'], $value['file_path'] . $newimagename);
                    $file['file_name']=$newimagename;
                    $uid = $this->user_model->insertdata('deal_files', $file);
                }
            }
       
            $data['success'] = 'well done';
            redirect(site_url() . 'admin/deals/index');
        }
    }

    /* ----Its Function use to active and deactive user login status------- */

    public function active() {
        if ($this->input->is_ajax_request()) {

            if ($this->input->post('value') == 0 && $this->input->post('reason') != '') {
                //echo 'sad';

                $join = array(array('table' => 'users',
                        'condition' => 'users.u_id=query.user_id',
                        'jointype' => 'inner'),
                    array('table' => 'user_profile',
                        'condition' => 'user_profile.p_u_id=users.u_id',
                        'jointype' => 'inner'),
                    array('table' => 'deals',
                        'condition' => 'deals.id=query.deal_id',
                        'jointype' => 'inner'),
                );
                $where = array('deal_id' => $this->input->post('d_id'),
                    'u_delete' => 1);
                $data = $this->user_model->get_joins('query', $where, $join, 'user_id , u_email , title , comp_person_name', NULL, 'user_id');

                foreach ($data as $data) {
                    $subject = "Deal Is Deactivated";
                    $txt = "Hello " . $data->comp_person_name;
                    $txt .= "<br>Deal  <b> $data->title </b> Is Deactivated.. <br> Reason  : {$this->input->post('reason')} ";

                    $headers = "MIME-Version: 1.0" . "\r\n";
                    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                    $headers .= "From: admin@adamglobal.com" . "\r\n";

                    //mail($to, $subject, $txt, $headers);
                }
            }
            $where = array('id' => $this->input->post('d_id'));
            $feild = array('status' => $this->input->post('value'));
            $this->user_model->updatedata('deals', $where, $feild);
            echo '1';
        }
    }

    public function details() {
        $where = array('id' => $this->uri->segment('4'));
        $data['deals'] = array_shift($this->user_model->get_sql_select_data('deals', $where));
        $this->layout->view("admin/deals_details_view", $data);
    }

    /* ---- Its function use to edit edit Profile------ */

    public function edit() {

        $where = array('deal_id' => $this->uri->segment('4'));
        //--update alert status set 0 value in status feild 0 use for deactive alert

        $this->user_model->UPDATEDATA('query', $where, array('status' => '0'));
        $where = array('id' => $this->uri->segment('4'));
        
        $data['deals'] = array_shift($this->user_model->get_sql_select_data('deals', $where));
        $data['query'] = $this->query($this->uri->segment('4'));
        //$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');

        if ($this->form_validation->run('deals') == FALSE) {
            $this->layout->view("admin/deals_edit_view", $data);
        } else {
            $deals = $this->input->post();

            
            $url_routes = preg_replace('/[^a-zA-Z0-9 ]/s ', '', $this->input->post('title'));
            $url_routes = str_replace(' ', '-', $url_routes) . '_' . random_string('alnum', 16);
            $deals['slug'] = $url_routes;

            $this->user_model->UPDATEDATA('deals', $where, $deals);
            
             
             /* --file upload---- */
            $this->load->library('upload');
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = '*';
           
            $file['deal_id']=$this->uri->segment('4');
            $this->upload->initialize($config);
            if ($this->upload->do_multi_upload("userfile")) {
                foreach ($this->upload->get_multi_upload_data() as $key => $value) {
                    $randomcode = random_string('alnum', 16);
                    $newimagename = $randomcode . $value['file_ext'];
                    rename($value['full_path'], $value['file_path'] . $newimagename);
                    $file['file_name']=$newimagename;
                    $uid = $this->user_model->insertdata('deal_files', $file);
                }
            } 

            $data['deals'] = array_shift($this->user_model->get_sql_select_data('deals', $where));
            $data['success'] = 'well done';
            $this->layout->view("admin/deals_edit_view", $data);
        }
    }

    public function removefile() {
        if ($this->input->is_ajax_request()) {
            $where=array('id'=>$this->input->post('fileid'));
             $this->user_model->DELETEDATA('deal_files', $where);
            
        }
    }
    
    
    
    
    public function query($deal_id) {
        
        
        $joins_query = array(array('table' => 'user_profile',
                'condition' => 'query.user_id=user_profile.p_u_id',
                'jointype' => 'inner'
        ));
        $where = array('deal_id' => $deal_id);
        $column = array('date', 'query_id', 'query', 'comp_person_image', 'concat(comp_person_gender,comp_person_name) as name');
        $data = $this->user_model->get_joins('query', $where, $joins_query, $column, NULL, NULL, 'query_id  DESC');
        return $data;
    }

    /* ---This function use to Show Alert_query details---- */

    public function query_alert() {
        if ($this->uri->segment('4') == '')
            redirect(site_url() . 'admin/home');

        $where = array('query_id' => base64_decode($this->uri->segment('4')));
        //--update alert status set 0 value in status feild 0 use for deactive alert
        $this->user_model->UPDATEDATA('query', $where, array('status' => '0'));
        
        $reulwhere=array('query_id' => base64_decode($this->uri->segment('4')),
                        'user_id !='=>$this->session->userdata('u_id'));
             
        $this->user_model->UPDATEDATA('query_response',$reulwhere , array('status' => '0'));


        $joins_query = array(array('table' => 'user_profile',
                'condition' => 'query.user_id=user_profile.p_u_id',
                'jointype' => 'left'));
        $column = array('query.date', 'deal_id', 'query', 'query_id', 'concat(comp_person_gender,comp_person_name) as name', 'comp_person_image');
        $this->data['query'] = $this->user_model->get_joins('query', $where, $joins_query, $column);
        $this->layout->view('admin/query_alert_view', $this->data);
    }

    public function query_reply() {
        if ($this->input->is_ajax_request()) {
            $query_responce = array('query_id' => $this->input->post('query_id'),
                'user_id' => $this->session->userdata('u_id'),
                'response' => $this->input->post('response'),
                'date' => time());
            $this->user_model->insertdata('query_response', $query_responce);

            $columns = array('concat(comp_person_gender,comp_person_name) as name', 'comp_person_image');
            $user = $this->user_model->get_joins('user_profile', array('p_u_id' => $this->session->userdata('u_id')), NULL, $columns);

            $data = '<div class="reply_ans">';
            $data.='<div class="left_content">';
            $data.='<img class="img-circle reply_img img-thumbnail" src="' . $user[0]->comp_person_image . '" />';
            $data.='</div>';
            $data.='<div class="right_content">';
            $data.='<p><b>' . $user[0]->name . '</b> <span class="pull-right">2 seconds ago</span></p>';
            $data.= nl2br($this->input->post('response'));
            $data.='</div></div>';
            echo json_encode($data);
        }
    }

}

?>
