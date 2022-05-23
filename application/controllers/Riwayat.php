<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
        $this->load->model('Web_model');
        $this->load->model('Riwayat_model');
        $this->load->model('manageorder_model');
        $this->customer_login_check();
    }
    public function index() {
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $data['customer_email']);
                redirect('get_riwayat');
            } else {
                $this->session->set_flashdata('message', 'Customer Gagal Login');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    public function riwayats() {
        $data = array();
        $data['all_manage_riwayat_info'] =$this->Riwayat_model->manage_riwayat_info();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/riwayat', $data);
        $this->load->view('web/inc/footer');
    }
    
        
    
    public function customer_login_check(){
       
       $customer_email = $this->session->userdata('customer_email');
       $customer_name = $this->session->userdata('customer_name');
       $id = $this->session->userdata('customer_id');
       $this->session->userdata('customer_id');
       
       if($customer_email==true){
          redirect('get_riwayat');
       }
        
    }
    
}
