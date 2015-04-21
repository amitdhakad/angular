<?php

require_once(APPPATH . 'core/MY_Worker.php');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Worker {
    
    public function __construct() {
        parent::__construct();       
        
    }
    
    
/*---This function use to show all Assigned Order/product accroding to worker/user----*/
    public function index() {
        $data['user']=  array_shift($this->user_model->user_details(array('u_id'=>$this->session->userdata('u_id'))));
         $udata = array('city_id' => $data['user']->comp_city);
         $this->session->set_userdata($udata);
         
        $this->load->view("template/cityadmin",$data);
    }
    
    
    
    public function profile(){
        $data['user']=  array_shift($this->user_model->user_details(array('u_id'=>$this->session->userdata('u_id'))));
         $udata = array('city_id' => $data['user']->comp_city);
         $this->session->set_userdata($udata);
        $this->load->view("cityadmin/profile",$data);
    }

        public function homepage(){  
        $data['users']=$this->user_model->user_details(array('comp_city'=>$this->session->userdata('city_id'),'u_group !='=>1,'u_id !='=>$this->session->userdata('u_id')));
        $this->load->view("cityadmin/user_list_view",$data);
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
        redirect(site_url());
        
    }
    
      public function active() {
       
            
            $where = array('u_id' => $this->input->post('u_id'));
            $feild = array('u_status' => $this->input->post('value'));
            
            //--Get user email Id For send email
            $users = array_shift($this->user_model->user_details($where));
            $to = $users->u_email;
            
            
            if ($this->input->post('value') == 0) {   
                
                $subject = "Reject";                           
                $txt = "Hello ".$users->comp_person_name;
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
                
             //---Accepted Message
                
                $subject = "Approval";           
                
                $txt = "Hello ".$users->comp_person_name;
                $txt .= "<br>YOur Profile Is accepted.. <br> Your Login Details : <br>
                           Email_id : $users->u_email <br>
                           Password : $password ";
                
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= "From: admin@adamglobal.com" . "\r\n";

                //mail($to, $subject, $txt, $headers);
                
             //---End Accepted Message
                
                $feild['u_password'] =  md5($password);
                $feild['u_group'] = 3;
            }

            $this->user_model->updatedata('users', $where, $feild);
            
        }
        
         public function password(){
            $this->load->view("cityadmin/password_view");
        }
        public function pass_update() {
        
        $this->form_validation->set_rules('oldpass', 'Old Password', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('repassword', 'Password Confirmation', 'required|matches[password]');
        if ($this->form_validation->run() == FALSE){
			//$msg=validation_errors();
                   $msg['msg']="Input Values not valid !! ";
                    $msg['type'] = 'error';
           }else{
               $where=array('u_id'=>$this->session->userdata('u_id'),
                            'u_password'=>md5($this->input->post('oldpass')));
               $result=$this->user_model->user_details($where);
               if($result){
                       $this->user_model->UPDATEDATA('users',$where,array('u_password'=>md5($this->input->post('password'))));
                        $msg['msg'] = 'Password Successfully Updated !!';
                        $msg['type'] = 'success';
            } else {
                $msg['msg'] = "Old Password Is not Valid !!";
                $msg['type'] = 'error';
            }
           }
           print_r(json_encode($msg));
        
        
    }
   
    
}