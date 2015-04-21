<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
  | -------------------------------------------------------------------
  | USER AGENT TYPES
  | -------------------------------------------------------------------
  | This file contains four arrays of user agent data.  It is used by the
  | User Agent Class to help identify browser, platform, robot, and
  | mobile device data.  The array keys are used to identify the device
  | and the array values are used to set the actual name of the item.
  |
 */


 


$config = array(
    'registration' => array(
        array(
            'field' => 'comp_name',
            'label' => 'Company Name',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_address',
            'label' => 'Company Address',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_address',
            'label' => 'Company Address',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_city[id]',
            'label' => 'Company City',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_country[id]',
            'label' => 'Company Country',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_email',
            'label' => 'Company Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        array(
            'field' => 'comp_phone',
            'label' => 'Company Phone',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_person_gender',
            'label' => 'Gender',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_person_name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_person_position',
            'label' => 'Company Phone',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_person_phone',
            'label' => 'Company Phone',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_person_email',
            'label' => 'Email',
            'rules' => 'trim|required|is_unique[users.u_email]|valid_email|xss_clean'
        ),
        array(
            'field' => 'comp_services',
            'label' => 'Services',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_target_market',
            'label' => 'Target Market',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_territories',
            'label' => 'Territories',
            'rules' => 'trim|required|xss_clean'
        ),
        array(
            'field' => 'comp_strength',
            'label' => 'Strength',
            'rules' => 'trim|required|xss_clean'
        ),
      
        
    ),    
    'login' => array(
         array(
          'field' => 'email',
          'label' => 'Email',
          'rules' => 'trim|valid_email|required|xss_clean|'
          ), 
        array(
            'field' => 'pass',
            'label' => 'Password',
            'rules' => 'required|xss_clean|'
        ),
    ),   
    'deals' => array(
         array(
          'field' => 'title',
          'label' => 'Title',
          'rules' => 'trim|required|xss_clean|'
          ), 
        array(
          'field' => 'budget',
          'label' => 'Budget',
          'rules' => 'trim|required|xss_clean|'
          ),
        array(
          'field' => 'description',
          'label' => 'Description',
          'rules' => 'trim|required|xss_clean|'
          ),
       
    ),   
    
    
    'messagesend'=>array(
                    array(
                     'field' => 'reciver_id',
                     'label' => 'Receiver',
                     'rules' => 'trim|required|xss_clean|'
                     ), 
                   array(
                     'field' => 'message',
                     'label' => 'Message',
                     'rules' => 'trim|required|xss_clean|'
                     ),
        )

);


