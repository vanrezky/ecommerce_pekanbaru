<?php

class Riwayat_model extends CI_Model{
    
    public function manage_riwayat_info(){
        $id = $this->session->userdata('customer_id');
        $ids = 10;
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('customer_id', $id);//
        $result = $this->db->get();
        return $result->result();
    }
    
    public function order_info_by_id($order_id){
        $this->db->select('*');
        $this->db->from('tbl_order');
        $this->db->where('order_id',$order_id);
        $result = $this->db->get();
        return $result->row();
    }

    public function update_resi($data,$order_id){
        $this->db->where('order_id', $order_id);
        return $this->db->update('tbl_order', $data);
    }
    
    public function customer_info_by_id($custoemr_id){
        $this->db->select('*');
        $this->db->from('tbl_customer');
        $this->db->where('customer_id',$custoemr_id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function shipping_info_by_id($shipping_id){
        $this->db->select('*');
        $this->db->from('tbl_shipping');
        $this->db->where('shipping_id',$shipping_id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function payment_info_by_id($payment_id){
        $this->db->select('*');
        $this->db->from('tbl_payment');
        $this->db->where('payment_id',$payment_id);
        $result = $this->db->get();
        return $result->row();
    }
    
    public function orderdetails_info_by_id($order_id){
        $this->db->select('*');
        $this->db->from('tbl_order_details');
        $this->db->where('order_id',$order_id);
        $result = $this->db->get();
        return $result->result();
    }
    
    
    
}