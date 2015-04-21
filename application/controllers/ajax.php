<?php
require APPPATH.'core/'.$CFG->config['subclass_prefix'].'Home.php';
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ajax extends MY_Home {

    public function __construct() {
        parent::__construct();
    }

    public function city($country_id=''){ 
        if($country_id)
            $where=array('country_id'=>$country_id);
        else
           $where=NUll;
       $result =$this->user_model->get_sql_select_data('cities',$where);
       print_r(json_encode($result));
    }
     public function country(){        
       $result['countries'] = $this->user_model->get_sql_select_data('country');
       $result['cities'] = $this->user_model->get_sql_select_data('cities');
       print_r(json_encode($result));
    }

}

?>
