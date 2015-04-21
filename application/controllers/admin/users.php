<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Users extends MY_Controller {

    public $data = array();

    public function __construct() {
        parent::__construct();
    }

    /* ----- Its function use to show all Worker list ----- */

    public function index() {
        $data['users'] = $this->user_model->user_details(array('u_delete' => 1, 'u_group' => 2));
        $this->layout->view('admin/users_list', $data);
    }
    
    public function reject() {
        $data['users'] = $this->user_model->user_details(array('u_delete' => 0, 'u_group !=' => 1));
        $this->layout->view('admin/reject_user_list', $data);
    }

    public function approval() {
        $data['users'] = $this->user_model->approval();
        $this->layout->view('admin/user_approvel_list', $data);
    }
    
    
    public function all() {

        $data['users'] = $this->user_model->user_details(array('u_delete' => 1, 'u_group !=' => 1));
        $this->layout->view('admin/alluser_show_list', $data);
    }

    /* ---- Its function use to Add new worker ------ */

    public function add() {

        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        //registration
        if ($this->form_validation->run('registration') == FALSE) {
            $this->layout->view("admin/worker_add_view", $this->data);
        } else {

            /* --file upload---- */
            $config['upload_path'] = './uploads/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload');
            $this->upload->initialize($config);

            if (!$this->upload->do_upload()) {
                $this->data['error'] = $this->upload->display_errors();
                $this->data['title'] = 'Home';
                $this->layout->view("admin/worker_add_view", $this->data);
            } else {
                $uploads = array($this->upload->data());
                foreach ($uploads as $key => $value) {
                    $randomcode = random_string('alnum', 16);
                    $newimagename = $randomcode . $value['file_ext'];
                    rename($value['full_path'], $uploads[0]['file_path'] . $newimagename);
                    $userfile = $newimagename;

                    $users = $this->input->post('users');
                    $users['u_password'] = md5($users['u_password']);
                    //$users['u_group'] = '2';
                    $uid = $this->user_model->insertdata('users', $users);

                    $profile = $this->input->post('user_profile');
                    $profile['p_u_id'] = $uid;
                    $profile['p_image'] = $userfile;
                    $this->user_model->insertdata('user_profile', $profile);

                    $this->data['success'] = 'well done';

                    redirect(site_url() . 'admin/worker/index');
                }
            }
        }
    }

    /* ----Its Function use to active and deactive user login status------- */

    public function active() {
        if ($this->input->is_ajax_request()) {

            $where = array('u_id' => $this->input->post('u_id'));
            $feild = array('u_status' => $this->input->post('value'));

            $users = array_shift($this->user_model->user_details($where));
            $to = $users->u_email;

            if ($this->input->post('value') == 0) {
                $feild['u_group'] = 3;

                $subject = "Reject";

                $txt = "Hello " . $users->comp_person_name;
                $txt .= "<br>YOur Profile Is Rejected .. <br> Please contact to admin ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: admin@adamglobal.com" . "\r\n";

                //mail($to, $subject, $txt, $headers);
            } else {

                $seed = str_split('abcdefghijklmnopqrstuvwxyz' . '0123456789!@#$%^&*()'); // and any other characters
                shuffle($seed); // probably optional since array_is randomized; this may be redundant
                $password = '';
                foreach (array_rand($seed, 8) as $k)
                    $password .= $seed[$k];




                $subject = "Approval";

                $txt = "Hello " . $users->comp_person_name;
                $txt .= "<br>YOur Profile Is accepted.. <br> Your Login Details : <br>
                           Email_id : $users->u_email <br>
                           Password : $password ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: admin@adamglobal.com" . "\r\n";

                //mail($to, $subject, $txt, $headers);

                $feild['u_password'] = md5($password);
                $feild['u_group'] = 2;
            }

            $this->user_model->updatedata('users', $where, $feild);
            echo '1';
        }
    }
    
    
    public function delete(){
         $where = array('u_id' => $this->input->post('u_id'));
         $feild = array('u_delete' =>'0','u_status'=>'0');
          $this->user_model->updatedata('users', $where, $feild);
            echo '1';
    }

    

    public function accesspermission() {
        if ($this->input->is_ajax_request()) {

            $where = array('u_id' => $this->input->post('u_id'));
            $feild = array('u_status' => $this->input->post('value'));

            $users = array_shift($this->user_model->user_details($where));
            $to = $users->u_email;

            if ($this->input->post('value') == 0) {
                
                $subject = "Reject";
                $txt = "Hello " . $users->comp_person_name;
                $txt .= "<br>YOur Profile Is Rejected .. <br> Please contact to admin ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: admin@adamglobal.com" . "\r\n";

                //mail($to, $subject, $txt, $headers);
            } else {

                $seed = str_split('abcdefghijklmnopqrstuvwxyz' . '0123456789!@#$%^&*()'); // and any other characters
                shuffle($seed); // probably optional since array_is randomized; this may be redundant
                $password = '';
                foreach (array_rand($seed, 8) as $k)
                    $password .= $seed[$k];




                $subject = "Approval";
                $txt = "Hello " . $users->comp_person_name;
                $txt .= "<br>YOur Profile Is accepted.. <br> Your Login Details : <br>
                           Email_id : $users->u_email <br>
                           Password : $password ";

                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: admin@adamglobal.com" . "\r\n";

                //mail($to, $subject, $txt, $headers);

                $feild['u_password'] = md5($password);               
                $feild['u_delete']='1';
            }

            $this->user_model->updatedata('users', $where, $feild);
            echo '1';
        }
    }
    

    /* ---- Its function use to edit edit Profile------ */

    public function profile_edit() {
        $where = array('p_u_id' => $this->session->userdata('u_id'));
        $this->data['user_data'] = $this->user_model->get_sql_select_data('user_profile', $where, NULL, '1');
        $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
        //registration
        if ($this->form_validation->run('edit_profile') == FALSE) {
            $this->layout->view("admin/profile_edit_view", $this->data);
        } else {
            $profile = $this->input->post('user_profile');
            $this->user_model->UPDATEDATA('user_profile', $where, $profile);

            /* --file upload---- */
            $config['upload_path'] = './uploads/profile/';
            $config['allowed_types'] = 'gif|jpg|jpeg|png';
            $this->load->library('upload');
            $this->upload->initialize($config);

            if ($this->upload->do_upload()) {
                $uploads = array($this->upload->data());
                foreach ($uploads as $key => $value) {

                    $randomcode = random_string('alnum', 16);
                    $newimagename = $randomcode . $value['file_ext'];
                    rename($value['full_path'], $uploads[0]['file_path'] . $newimagename);
                    $userfile = $newimagename;

                    $profile['p_image'] = $userfile;
                    $this->user_model->UPDATEDATA('user_profile', $where, $profile);
                    //redirect(site_url() . 'home');
                }
            }
            $this->data['user_data'] = $this->user_model->get_sql_select_data('user_profile', $where, NULL, '1');
            $this->data['success'] = 'well done';
            $this->layout->view("admin/profile_edit_view", $this->data);
        }
    }

}

?>
