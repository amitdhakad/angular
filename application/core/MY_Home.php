<?php

class MY_Home extends CI_Controller {

    public $layout_view = 'template/home';

    function __construct() {
        parent::__construct();
        $this->load->library('layout');
        // error_reporting(0);
    }

    

}
