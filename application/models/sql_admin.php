<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sql_admin extends CI_Model
{
    function logged_id(){
        return $this->session->userdata('ad_id');
    }
    function sh_dep($table,$field,$id){
        $query=$this->db->query("select * from pk_dep,pk_class where pk_dep.d_id=pk_class.d_id && pk_dep.d_id=$id");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
    function login_data($table,$username,$password){
        //$query=$this->db->get_where($table, array("ad_username "=>$username,"ad_password"=>$password));
        $query=$this->db->query("select * from $table where ad_username='$username' && ad_password='$password'");  
        if ($query->num_rows()==1){
            $row=$query->result_array();
            return $row;
        }else{return false;}

    }
    function select_all($table,$order_by,$order_type){
        $query=$this->db->query("select * from $table ORDER BY $order_by $order_type");
        if ( $query->num_rows() > 0 ){
            $num_rows=$query->num_rows();
            $row = $query->result_array();
            return $row;
        }
    }
    function select_where($table,$field,$id){
        $query=$this->db->query("select * from $table where $field=$id");
        if ( $query->num_rows() > 0 ){
            $row=$query->result_array();
            return $row;
        }else{
            return FALSE;
        }
    }
    function select_d_id($table,$field,$id){
        $query=$this->db-query("select d_id from $table where $field=$id");
        return $row->result_array();
    }
    
    function db_num_rows_all($table){
        $query=$this->db->query("select * from $table");
        $num_rows=$query->num_rows();
        return $num_rows;
    }
    function db_num_rows_where($table,$field,$id){
        $query=$this->db->query("select * from $table where $field=$id");
        $num_rows=$query->num_rows();
        return $num_rows;
    }
    function add_process01($table,$data){
        $this->db->insert($table,$data);
    }
   
    function update_admin($table,$field,$id,$data){
        $query=$this->db->update($table,$data,array("$field"=>$id));
        //if(!$query){echo $query;}
        //echo $this->db->update_string($table,$data,array("$field"=>$id));
    }
    function del($table,$field,$id){
        $this->db->delete($table,array($field=>$id));
    }
    function check_login($table, $field1, $field2)
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
        echo "num".$query->num_rows();
    }

    /*------------------ public function --------------------*/
     function chk_add_process01($table,$field_chk,$data_chk){
        /*
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field_chk,$this->input->post("ad_username"));
        $query = $this->db->get();
        */
        $query = $this->db->get_where($table,array($field_chk => $data_chk));
        if($query->num_rows()!=0){return FALSE;}else{return TRUE;}
    }
    function join_sh_all_num($tb_join,$f_join){
        $query=$this->db->query("select * from $tb_join where $f_join");
        $num=$query->num_rows();
        return $num;
    }
     function chk_num_data($table,$field_chk,$data_chk){
        $query = $this->db->get_where($table,array($field_chk => $data_chk));
        return $query->num_rows();
    }
    function update_data($table,$field,$id,$data){
        $query=$this->db->update($table,$data,array("$field"=>$id));
        //if(!$query){echo $query;}
        //echo $this->db->update_string($table,$data,array("$field"=>$id));
    }
    function select_title($s_select,$s_table,$s_field){
        $query=$this->db->query("select pk_dep.d_name from pk_dep,pk_class where pk_class.d_id=pk_dep.d_id && pk_class.d_id=$s_field limit 1");
        $row=$query->result();
        $num=$query->num_rows();
        //echo "num".$num;
        return $row;
    }


    /*------------------ private function --------------------*/
    function join_pk_class_pk_dep($id){
        $query=$this->db->query("select * from pk_dep,pk_class where pk_dep.d_id=pk_class.d_id && pk_dep.d_id=$id order by pk_class.c_id desc");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
    function join_pk_std_class_dep_all(){
        $query=$this->db->query("select * from pk_users_std as std,pk_dep,pk_class where std.c_code=pk_class.c_code && pk_class.d_id=pk_dep.d_id  order by pk_dep.d_id desc");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
    // test join
    function join_sh_all($tb_join,$f_join){
        $query=$this->db->query("select * from $tb_join where $f_join ");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
    function join_pk_class_pk_dep_id_cid($id){
        $query=$this->db->query("select * from pk_dep,pk_class where pk_dep.d_id=pk_class.d_id && pk_class.c_id=$id order by pk_class.c_id desc");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
    function select_free($select,$table,$where){
        $query=$this->db->query("select $select from $table where $where");
        if ($query->num_rows()!=0){
            $row=$query->result();
            return $row;
        }else{return false;}
    }
    function select_free_array($select,$table,$where){
        $query=$this->db->query("select $select from $table where $where");
        if ($query->num_rows()!=0){
            $row=$query->result_array();
            return $row;
        }else{return false;}
    }
}