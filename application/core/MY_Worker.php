<?php

class MY_Worker extends CI_Controller {

    public $layout_view = 'template/cityadmin';
    function __construct() {
        parent::__construct();
        $this->load->library('layout');
        if ($this->session->userdata('u_type') != "2" || !$this->session->userdata('logged_in') )
            redirect(site_url());
        // error_reporting(0);
    }

    

}
