<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

    public function __construct()
  {
    parent::__construct();
		$this->load->model('User_model');
        $this->get_user();

	}
 
	public function index() {

       $data['user'] = $this->User_model->get_all_user();
	   $data['maincontent']= $this->load->view('admin/pages/manage_toko',$data, true);
       $this->load->view('admin/master', $data);
  }

    public function add_user() {
        $data= array();
        $data['maincontent']= $this->load->view('admin/pages/add_user','',true);
        $this->load->view('admin/master',$data);
    }

    public function save_user(){
        $data = array();
        $data['user_name']=$this->input->post('user_name');
        $data['user_email']=$this->input->post('user_email');
        $data['user_password']=MD5($this->input->post('user_password'));
        
        $this->form_validation->set_rules('user_name', 'Nama Toko', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == true){
            $result = $this->User_model->save_user_data($data);
            if($result){
                $this->session->set_flashdata('message','Data Berhasil Ditambahkan');
                redirect('user');   
            }
            else{
                $this->session->set_flashdata('message','Data Tidak Tersimpan');
                redirect('user');
            }
        }
        else{
            $this->session->set_flashdata('message',validation_errors());
            redirect('add/user');
        }
        
    }

     public function edit_user($id){
        $data= array();
        $data['user_by_id'] = $this->User_model->edit_user_info($id);
        $data['maincontent']= $this->load->view('admin/pages/edit_user',$data,true);
        $this->load->view('admin/master',$data);
    }
    
    public function update_user($id){
        $data = array();
        $data['user_name']=$this->input->post('user_name');
        $data['user_email']=$this->input->post('user_email');
        $data['user_password']=MD5($this->input->post('user_password'));
        
        $this->form_validation->set_rules('user_name', 'Nama Toko', 'trim|required');
        $this->form_validation->set_rules('user_email', 'Email', 'trim|required');
        $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
        
        if($this->form_validation->run() == true){
            $result = $this->User_model->update_user_info($data,$id);
            if($result){
                $this->session->set_flashdata('message','Update Data Berhasil');
                redirect('user');   
            }
            else{
                $this->session->set_flashdata('message','Update Data Gagal');
                redirect('user');
            }
        }
        else{
            $this->session->set_flashdata('message',validation_errors());
            redirect('edit/user');
        }
        
    }

    public function delete_user($id){
        $result = $this->User_model->delete_user_info($id);
        if ($result) {
            $this->session->set_flashdata('message', 'Data Berhasil Dihapus');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', 'Data Gagal Dihapus');
             redirect('user');
        }
    }

     public function get_user(){
       
       $email = $this->session->userdata('user_email');
       $name = $this->session->userdata('user_name');
       $id = $this->session->userdata('user_id');
       $user_role = $this->session->userdata('user_role');
       
       if($user_role=="2"){
          redirect('admin'); 
       }
        
    }

}
