<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Home extends MY_Controller {
    
    public function __construct() {
        parent::__construct();       
        
       }

    public function index() {
        redirect(site_url().'admin/users');
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
   
}

?>
