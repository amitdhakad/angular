<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function INSERTDATA($tablename, $feild = '') {

        if (!empty($tablename) || !empty($feild)):

            $this->db->set($feild);

            $insert = $this->db->insert($tablename);

            if ($insert):

                return $this->db->insert_id();



            endif;

        else: return "Invalid Input Provided";

        endif;
    }

    public function UPDATEDATA($tablename, $where = '', $feild = '') {

        if (!empty($tablename) || !empty($feild)):

            $this->db->where($where);

            $this->db->update($tablename, $feild);

        else: return "Invalid Input Provided";

        endif;
    }

    public function DELETEDATA($tablename = '', $where = '') {

        if (!empty($tablename) || !empty($where)):

            $this->db->where($where);

            $this->db->delete($tablename);

        else: return "Invalid Input Provided";

        endif;
    }

    public function get_sql_select_data($tablename, $where = '', $feild = '', $limit = '', $order_by = '', $like = '') {

        if (!empty($feild))
            $this->db->select($feild);

        if (empty($feild))
            $this->db->select();

        if (!empty($where))
            $this->db->where($where);

        if (!empty($limit))
            $this->db->limit($limit);

        if (!empty($like))
            $this->db->like($like);

        if (!empty($order_by))
            $this->db->order_by($order_by);

        $this->db->from($tablename);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_sql_data_where_not_in($tablename, $where = '', $where_in = '', $feild = '', $limit = '') {

        if (!empty($feild))
            $this->db->select($feild);

        if (empty($feild))
            $this->db->select();

        if (!empty($where))
            $this->db->where_not_in($where, $where_in);

        if (!empty($limit))
            $this->db->limit($limit);

        $this->db->from($tablename);

        $query = $this->db->get();

        return $query->result();
    }

    public function get_joins($table = '', $where = '', $joins = '', $columns = '', $like = '', $group_by = '', $order_by = '', $limit = '', $start = '') {

        if (!empty($columns))
            $this->db->select($columns);

        if (empty($columns))
            $this->db->select();

        if (is_array($joins) && count($joins) > 0) {

            foreach ($joins as $k => $v) {

                $this->db->join($v['table'], $v['condition'], $v['jointype']);
            }
        }

        if (!empty($group_by))
            $this->db->group_by($group_by);

        if (!empty($like))
            $this->db->like($like);

        if (!empty($limit))
            $this->db->limit($limit, $start);

        if (!empty($where))
            $this->db->where($where);

        if (!empty($order_by))
            $this->db->order_by($order_by);

        $this->db->from($table);
        return $this->db->get()->result();
    }
 
    function user_details($where = '', $order = '', $select = '') {
        if (!$select)
            $select = array('users.u_id', 'users.u_email', 'u_status', 'u_group', 'user_profile.*', 'cities.*', 'country.*');

        $joins = array(array('table' => 'user_profile', 'condition' => 'user_profile.p_u_id=users.u_id', 'jointype' => 'INNER'),
            array('table' => 'cities', 'condition' => 'user_profile.comp_city=cities.id', 'jointype' => 'INNER'),
            array('table' => 'country', 'condition' => 'user_profile.comp_country=country.id', 'jointype' => 'INNER'));
        if ($order)
            $this->db->order_by($order);
        else
            $this->db->order_by('u_id  DESC');

        return $this->get_joins('users', $where, $joins, $select);
    }

    /* --Its function use to get Approval Request Users ---- */

    public function approval() {

        $query = $this->db->query(
                "SELECT *
                FROM (
                `users`
                )
                INNER JOIN `user_profile` ON `user_profile`.`p_u_id` = `users`.`u_id`
                INNER JOIN `cities` ON `user_profile`.`comp_city` = `cities`.`id`
                INNER JOIN `country` ON `user_profile`.`comp_country` = `country`.`id`
                WHERE `u_delete` =1
                AND `u_group` !=1
                
                AND comp_city NOT
                IN (

                SELECT comp_city
                FROM (
                `users`
                )
                INNER JOIN `user_profile` ON `user_profile`.`p_u_id` = `users`.`u_id`
                WHERE `u_delete` =1
                AND u_group =2
                )
                ORDER BY `u_id` DESC"
        );

        return $query->result();
    }

    /* --Its function use to get query alert ---- */

    function query_alert($id = '') {
        $where = ('query.status=1');
        if ($id) {
            $where = "(query.status='1') and customer_id='$id'";
        }

        $joins = array(array('table' => 'deals',
                'condition' => 'query.deal_id=deals.id',
                'jointype' => 'inner'),
            array('table' => 'user_profile',
                'condition' => 'query.user_id=user_profile.p_u_id',
                'jointype' => 'inner'));
        $column = array('query.date', 'deal_id', 'query', 'query.query_id', 'title', 'concat(comp_person_gender,comp_person_name) as name');
        return $this->user_model->get_joins('query', $where, $joins, $column, NULL, NULL, 'query_id  DESC');
    }

    
    
    function replyalert() {       
        $where = "query_response.user_id !='{$this->session->userdata('u_id')}' and query_response.status='1'";      

        $joins = array( array('table' => 'query',
                            'condition' => 'query.query_id=query_response.query_id',
                            'jointype' => 'inner'),
                        array('table' => 'deals',
                            'condition' => 'query.deal_id=deals.id',
                            'jointype' => 'inner'),
                        array('table' => 'user_profile',
                            'condition' => 'query_response.user_id=user_profile.p_u_id',
                            'jointype' => 'inner'),
                        );
        $column = array('query.date', 'deal_id', 'query', 'query.query_id', 'title', 'concat(comp_person_gender,comp_person_name) as name');
        return $this->user_model->get_joins('query_response', $where, $joins, $column, NULL, 'query_response.query_id', 'query_id  DESC');
    }   
    
    
    public function message() {
        $joins = array(array('table' => 'user_profile',
                'condition' => 'message.user_id=user_profile.p_u_id',
                'jointype' => 'inner'),
            array('table' => 'deals',
                'condition' => 'message.deal_id=deals.id',
                'jointype' => 'left'));

        $where = array('reciver_id' => $this->session->userdata('u_id'), 'message.status' => '1');
        $column_resp = array('message.*', 'concat(comp_person_gender, comp_person_name) as name', 'comp_person_image', 'title');

        return $this->get_joins('message', $where, $joins, $column_resp, NULL, NULL, 'msg_id  DESC');
    }

}
