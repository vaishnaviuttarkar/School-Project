<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class School_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function display_student(){
        $this->db->select('s.id,s.image,s.name as name,s.email,s.created_at,c.name as class_name');
        $this->db->from('`school_db`.`student` as s');
        $this->db->join('`school_db`.`classes` as c','s.class_id = c.class_id');
        return $this->db->get()->result_array();
    }

    public function get_student_details($cond){
        $this->db->select('*');
        $this->db->from('`school_db`.`student`');
        if($cond<>'')
        {
            $this->db->where('id',$cond);
        }
        return $this->db->get()->result_array();
    }

    public function display_class($cond){
        $this->db->select('class_id,name');
        $this->db->from('`school_db`.`classes`');
        if($cond<>'')
        {
            $this->db->where('class_id',$cond);
        }
        return $this->db->get()->result_array();
    }

    public function insert($tb,$array){
        $this->db->insert("$tb","$array");
        return $this->db->insert_id();
    }

    public function delete_entry($srno,$tb,$col)
    {
        $this->db->where("$col",$srno);
        $this->db->delete("school_db.$tb");
        return $this->db->affected_rows();
    }

    public function update_student_data($id,$array)
    {
        $this->db->where("id",$id);
        $this->db->update("school_db.student",$array);
        return $this->db->affected_rows();
    }

    public function update_class_data($id,$array)
    {
        $this->db->where("class_id",$id);
        $this->db->update("school_db.classes",$array);
        return $this->db->affected_rows();
    }

}
?>