<?php

class User_Model extends CI_Model{
    
    public function save_user_data($data){
        $this->db->set('user_role', 2);
        $this->db->set('created_time', date("Y-m-d H-i-s"));
        return $this->db->insert('tbl_user', $data);
    }
    
    public function get_all_user(){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $info = $this->db->get();
        return $info->result();
    }
    
    public function edit_user_info($id){
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id',$id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_user_info($id){
        $this->db->where('user_id', $id);
        return $this->db->delete('tbl_user');
    }
    
    public function update_user_info($data,$id){
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_user', $data);
    }
    
    public function published_user_info($id) {
        $this->db->set('publication_status', 1);
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_user');
    }
    
    public function unpublished_user_info($id) {
        $this->db->set('publication_status', 0);
        $this->db->where('id', $id);
        return $this->db->update('tbl_user');
    }
    
}