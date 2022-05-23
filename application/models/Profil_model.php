<?php

class Profil_Model extends CI_Model{
    
    public function save_profil_info($data){
        return $this->db->insert('tbl_brand', $data);
    }
    
    public function getall_profil_info(){
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $info = $this->db->get();
        return $info->result();
    }    
    
    public function edit_profil_info($id){
        $this->db->select('*');
        $this->db->from('tbl_brand');
        $this->db->where('brand_id',$id);
        $info = $this->db->get();
        return $info->row();
    }
    
    public function delete_profil_info($id){
        $this->db->where('brand_id', $id);
        return $this->db->delete('tbl_brand');
    }
    
    public function update_brand_info($data,$id){
        $this->db->where('brand_id', $id);
        return $this->db->update('tbl_brand', $data);
    }
    
    public function published_brand_info($id) {
        $this->db->set('publication_status', 1);
        $this->db->where('brand_id', $id);
        return $this->db->update('tbl_brand');
    }
    
    public function unpublished_brand_info($id) {
        $this->db->set('publication_status', 0);
        $this->db->where('brand_id', $id);
        return $this->db->update('tbl_brand');
    }
    
}