<?php

class MY_Controller extends CI_Controller {

    public $layout_view = 'template/admin';

    function __construct() {
        parent::__construct();
        //--Check admin login 
       if ($this->session->userdata('u_type') != "1" || !$this->session->userdata('logged_in') )
            redirect(site_url());
        
       $this->load->library('layout');
        
    }


    
}
