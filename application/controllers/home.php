<?php require APPPATH . 'core/' . $CFG->config['subclass_prefix'] . 'Home.php';
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct() {
        parent::__construct();
         if ($this->session->userdata('u_type') == "2" && $this->session->userdata('logged_in') )
            redirect(site_url().'cityadmin/');
        
    }
    

    public function index(){
        $this->load->view("template/home");
    }

    public function homepage(){
        $this->load->view("home_view");
    }

    public function login(){

        if ($this->form_validation->run('login') == FALSE) {
            echo 'error';
        } else {

            $where = array('u_email' => $this->input->post('email'),
                'u_password' => md5($this->input->post('pass')),
                'u_status' => '1');
            $result =  array_shift($this->user_model->user_details($where));

            if (!empty($result)) {
                $udata = array(                    
                    'u_id' => $result->u_id,
                    'u_type' => $result->u_group,
                    'u_email' => $result->u_email,
                    'comp_person_gender'=>$result->comp_person_gender,
                    'comp_person_name'=>$result->comp_person_name,
                    'comp_person_image'=>$result->comp_person_image,
                    'logged_in' => TRUE
                );
                $this->session->set_userdata($udata);

                if ($result->u_group == 1) {
                    echo '1';
                }else if ($result->u_group == 2) {
                    echo '2';
                }else if ($result->u_group == 3) {
                    echo '3';
                }
            } else {
                echo 'error';
            }
        }
    }
    public function register() {
         $this->load->view("registration_view");
    }
    
       

    public function signup() {

        if ($this->form_validation->run('registration') == FALSE) {
               echo '0';
              // echo validation_errors(); 
        } else {
            
            $password = rand();
            $email = $this->input->post('users');

            $users['u_email'] =$this->input->post('comp_person_email');

            $users['u_password'] = md5($password);
            $users['u_group'] = '3';
            $users['u_status'] = '0';

            $cityid=$this->input->post('comp_city');
            $cityid=$cityid['id'];
            
          
            
            $where = array('comp_city' => $cityid,
                           'u_group' => '2');

            $city = $this->user_model->user_details($where);
          
            if ($city)
                $users['approval'] = '2';
            else
                $users['approval'] = '1';

            $uid = $this->user_model->insertdata('users', $users);

            $profile = $this->input->post();
            unset($profile['comp_person_email']);
            
              $country=$this->input->post('comp_country');
            $country=$country['id'];
            
            $profile['comp_country']=$country;
            $profile['comp_city']=$cityid;
                    
            $profile['p_u_id'] = $uid;
            
            $this->user_model->insertdata('user_profile', $profile);        
            
            
            $subject = "Thankyou !!";

            $txt = "Hello " . $profile['comp_person_gender'].' '.$profile['comp_person_name'];
            $txt .= "<br>Thankyou For registration!!<br>  please wait for approval";

            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: admin@adamglobal.com" . "\r\n";
            //mail($this->input->post('comp_person_email'), $subject, $txt, $headers);
            
            echo '1';
            
        }
    }

    public function logout() {
        $newdata = array(
            'u_id' => '',
            'u_type' => '',
            'logged_in' => FALSE,
            'u_email' => '',
            'comp_person_gender'=>'',
            'comp_person_name'=>'',
            'comp_person_image'=>'',
        );
        $this->session->set_userdata($newdata);
        $this->session->sess_destroy();       
        
    }
 
   public function user() {
        $data['user']=  array_shift($this->user_model->user_details(array('u_id'=>$this->session->userdata('u_id'))));
        $this->load->view("profile",$data);
    } 
    public function userinfo() {
        print_r(json_encode($this->user_model->get_sql_select_data('country', NULL, NULL, NULL, 'country_name ASC'))) ;
    }
    
    public function check(){
       if ($this->session->userdata('u_id')!= "" && $this->session->userdata('logged_in')){
           //print_r(json_encode(array_shift($this->user_model->user_details(array('u_id'=>$this->session->userdata('u_id'))))));
           $data=array(    
                    'u_email'=>$this->session->userdata('u_email'),
                    'comp_person_gender'=>$this->session->userdata('comp_person_gender'),
                    'comp_person_name'=>$this->session->userdata('comp_person_name'),
                    'comp_person_image'=>$this->session->userdata('comp_person_image'),
                );
           print_r(json_encode($data));
           
       }
    }
    
    

}

?>
