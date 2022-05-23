<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Web extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Riwayat_model');
    }


    public function index() {
        $data = array();

        $data['all_featured_products'] = $this->web_model->get_all_featured_product();
        $data['all_new_products'] = $this->web_model->get_all_new_product();
        $data['sepatu'] = $this->web_model->get_all_new_product_sepatu();
        $data['baju'] = $this->web_model->get_all_new_product_baju();
        $data['celana'] = $this->web_model->get_all_new_product_celana();
        $data['jaket'] = $this->web_model->get_all_new_product_jaket();
        $data['bajumuslimah'] = $this->web_model->get_all_new_product_bajumuslimah();
        $data['get_all_category'] = $this->web_model->get_all_category();
		
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/inc/slider');
        $this->load->view('web/pages/home', $data);
        $this->load->view('web/inc/footer');
    }

    public function contact() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/contact');
        $this->load->view('web/inc/footer');
    }

    public function privacy() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/privacy_policy');
        $this->load->view('web/inc/footer');
    }


    public function cart() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $data['cart_contents'] = $this->cart->contents();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/cart', $data);
        $this->load->view('web/inc/footer');
    }

    public function product() {
        $data = array();
        $data['get_all_product'] = $this->web_model->get_all_product();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function Riwayat() {
        $data = array();
        $data['get_all_category'] = $this->web_model->get_all_category();
        $data['all_manage_riwayat_info'] =$this->Riwayat_model->manage_riwayat_info();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/riwayat', $data);
        $this->load->view('web/inc/footer');
    }

    public function riwayat_details($order_id){
        $id['order_id'] = $this->uri->segment(3);
            $q = $this->db->get_where("tbl_order",$id);
            $data = array();

            //$p['lokasi_organisasi'] = $this->Peta_model->getLokasi($param);
            foreach($q->result() as $dt)
            {
                $data['id_param'] = $dt->order_id;
                $data['customer_id'] = $dt->customer_id;
                $data['foto'] = $dt->foto;
            }

        $data['st'] = "edit"; 


        $data['get_all_category'] = $this->web_model->get_all_category();
        $order_info =$this->manageorder_model->order_info_by_id($order_id);
        $customer_id = $order_info->customer_id;
        $shipping_id = $order_info->shipping_id;
        $payment_id = $order_info->payment_id;
        
        $data['customer_info'] =$this->manageorder_model->customer_info_by_id($customer_id);
        $data['shipping_info'] =$this->manageorder_model->shipping_info_by_id($shipping_id);
        $data['payment_info'] =$this->manageorder_model->payment_info_by_id($payment_id);
        $data['order_details_info'] =$this->manageorder_model->orderdetails_info_by_id($order_id);
        $data['order_info'] =$this->manageorder_model->order_info_by_id($order_id);
        $data['all_manage_riwayat_info'] =$this->Riwayat_model->manage_riwayat_info();
        
        //$data['maincontent']= $this->load->view('web/pages/order_details',$data);
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/riwayat_details', $data);
        $this->load->view('web/inc/footer');
    }

    public function update_riwayat($order_id) {
        $data = array();
        $data['customer_id'] = $this->input->post('customer_id');
        $data['customer_id'] = $this->session->userdata('customer_id');
        
        $product_delete_image = $this->input->post('product_delete_image');
        
        $delete_image = substr($product_delete_image, strlen(base_url()));
        
        

        $this->form_validation->set_rules('customer_id', 'Customer Id', 'trim|required');

        if (!empty($_FILES['resi_order']['name'])){
            $config['upload_path'] = './uploads/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 4096;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('foto')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', $error);
                redirect('web/details');
            }
            else{
                $post_image = $this->upload->data();
                $data['foto'] = $post_image['file_name'];
                unlink($delete_image);
            }
        }
        if ($this->form_validation->run() == true) {
                    
            
            $result = $this->Riwayat_model->update_resi($data,$order_id);

            if ($result) {
                $this->session->set_flashdata('message', 'Resi Berhasil Diupload');
                redirect('get_riwayat');
            } else {
                $this->session->set_flashdata('message', 'Resi Gagal Diupload');
                redirect('get_riwayat');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('get_riwayat');
        }
    }

    public function single($id) {
        $data = array();
        $data['get_single_product'] = $this->web_model->get_single_product($id);
        $data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/single', $data);
        $this->load->view('web/inc/footer');
    }

    public function error() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/error');
        $this->load->view('web/inc/footer');
    }

    public function category_post($id) {
        $data = array();
        $data['get_all_product'] = $this->web_model->get_all_product_by_cat($id);
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/product', $data);
        $this->load->view('web/inc/footer');
    }

    public function save_cart() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $product_id = $this->input->post('product_id');
        $results = $this->web_model->get_product_by_id($product_id);
        $data['id'] = $results->product_id;
        $data['name'] = $results->product_title;
        $data['price'] = $results->product_price;
        $data['qty'] = $this->input->post('qty');
        $data['options'] = array('product_image' => $results->product_image);

        $query= $this->cart->insert($data);

        var_dump($data);
        die;
        
        redirect('cart');
    }

    public function update_cart() {
        $data = array();
        $data['qty'] = $this->input->post('qty');
        $data['rowid'] = $this->input->post('rowid');

        $this->cart->update($data);
        redirect('cart');
    }

    public function remove_cart() {

        $data = $this->input->post('rowid');
        $this->cart->remove($data);
        redirect('cart');
    }

    public function register_success() {
        $customer_name = $this->session->flashdata('customer_name');
        if (!$customer_name) {
            redirect('customer/register');
        }
        $data = array();
        $data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/register_success');
        $this->load->view('web/inc/footer');
    }

    public function user_form() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/user_form');
        $this->load->view('web/inc/footer');
    }

    public function customer_register() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/customer_register');
        $this->load->view('web/inc/footer');
    }

    public function customer_login() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/customer_login');
        $this->load->view('web/inc/footer');
    }

    public function customer_save() {
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name');
        $data['customer_email'] = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address'] = $this->input->post('customer_address');
        $data['customer_city'] = $this->input->post('customer_city');
        $data['customer_country'] = $this->input->post('customer_country');
        $data['customer_phone'] = $this->input->post('customer_phone');
        $data['customer_zipcode'] = $this->input->post('customer_zipcode');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);
            if ($result) {
                $this->session->set_flashdata('customer_name', $data['customer_name']);
                $this->session->set_flashdata('customer_email', $data['customer_email']);
                redirect('register/success');
            } else {
                $this->session->set_flashdata('message', 'Customer Registration Fail');
                redirect('customer/register');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/register');
        }
    }

    public function customer_logincheck() {
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
                redirect('/');
            } else {
                $this->session->set_flashdata('message', 'Customer Gagal Login');
                redirect('customer/login');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/login');
        }
    }

    

    public function customer_shipping_login() {
        $data = array();
        $data['customer_email'] = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));

        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->get_customer_info($data);
            if ($result) {
                $this->session->set_userdata('customer_id', $result->customer_id);
                $this->session->set_userdata('customer_email', $result->customer_email);
                redirect('customer/shipping');
            } else {
                $this->session->set_flashdata('messagelogin', 'Customer Gagal Login');
                redirect('user_form');
            }
        } else {
            $this->session->set_flashdata('messagelogin', validation_errors());
            redirect('user_form');
        }
    }

    public function customer_shipping_register() {
        $data = array();
        $data['customer_name'] = $this->input->post('customer_name');
        $data['customer_email'] = $this->input->post('customer_email');
        $data['customer_password'] = md5($this->input->post('customer_password'));
        $data['customer_address'] = $this->input->post('customer_address');
        $data['customer_city'] = $this->input->post('customer_city');
        $data['customer_country'] = $this->input->post('customer_country');
        $data['customer_phone'] = $this->input->post('customer_phone');
        $data['customer_zipcode'] = $this->input->post('customer_zipcode');

        $this->form_validation->set_rules('customer_name', 'Customer Name', 'trim|required');
        $this->form_validation->set_rules('customer_email', 'Customer Email', 'trim|required|valid_email|is_unique[tbl_customer.customer_email]');
        $this->form_validation->set_rules('customer_password', 'Customer Password', 'trim|required');
        $this->form_validation->set_rules('customer_address', 'Customer Address', 'trim|required');
        $this->form_validation->set_rules('customer_city', 'Customer City', 'trim|required');
        $this->form_validation->set_rules('customer_country', 'Customer Country', 'trim|required');
        $this->form_validation->set_rules('customer_phone', 'Customer Phone', 'trim|required');
        $this->form_validation->set_rules('customer_zipcode', 'Customer Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_customer_info($data);

            if ($result) {
                $this->session->set_userdata('customer_id', $result);
                redirect('customer/shipping');
            } else {
                $this->session->set_flashdata('message', 'Customer Shipping Fail');
                redirect('user_form');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('user_form');
        }
    }

    public function customer_shipping() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/customer_shipping');
        $this->load->view('web/inc/footer');
    }

    public function save_shipping_address() {
        $data = array();
        $data['shipping_name'] = $this->input->post('shipping_name');
        $data['shipping_email'] = $this->input->post('shipping_email');
        $data['shipping_address'] = $this->input->post('shipping_address');
        $data['shipping_city'] = $this->input->post('shipping_city');
        $data['shipping_country'] = $this->input->post('shipping_country');
        $data['shipping_phone'] = $this->input->post('shipping_phone');
        $data['shipping_zipcode'] = $this->input->post('shipping_zipcode');

        $this->form_validation->set_rules('shipping_name', 'Shipping Name', 'trim|required');
        $this->form_validation->set_rules('shipping_email', 'Shipping Email', 'trim|required|valid_email|is_unique[tbl_shipping.shipping_email]');
        $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'trim|required');
        $this->form_validation->set_rules('shipping_city', 'Shipping City', 'trim|required');
        $this->form_validation->set_rules('shipping_country', 'Shipping Country', 'trim|required');
        $this->form_validation->set_rules('shipping_phone', 'Shipping Phone', 'trim|required');
        $this->form_validation->set_rules('shipping_zipcode', 'Shipping Zipcode', 'trim|required');

        if ($this->form_validation->run() == true) {
            $result = $this->web_model->save_shipping_address($data);
            $this->session->set_userdata('shipping_id', $result);
            if ($result) {
                redirect('checkout');
            } else {
                $this->session->set_flashdata('message', 'Customer Shipping Fail');
                redirect('customer/shipping');
            }
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('customer/shipping');
        }
    }

    public function checkout() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $this->load->view('web/inc/header', $data);
        $this->load->view('web/pages/checkout');
        $this->load->view('web/inc/footer');
    }

    public function payment() {
        $data = array();
		$data['get_all_category'] = $this->web_model->get_all_category();
        $data['cart_contents'] = $this->cart->contents();
        //$this->load->view('web/inc/header');
        $this->load->view('web/pages/payment', $data);
        $this->cart->destroy();
        //$this->load->view('web/inc/footer');
    }

    public function save_order() {
        $data['payment_type'] = $this->input->post('payment');

        $this->form_validation->set_rules('payment', 'Payment', 'trim|required');

        if ($this->form_validation->run() == true) {
            $payment_id = $this->web_model->save_payment_info($data);
            $odata = array();
            $odata['customer_id'] = $this->session->userdata('customer_id');
            $odata['shipping_id'] = $this->session->userdata('shipping_id');
            $odata['payment_id'] = $payment_id;
            //$tax = ($this->cart->total() * 15) / 100;
            $odata['order_total'] = $this->cart->total();

            $order_id = $this->web_model->save_order_info($odata);

            $oddata = array();

            $myoddata = $this->cart->contents();



            foreach ($myoddata as $oddatas) {


                $oddata['order_id'] = $order_id;
                $oddata['product_id'] = $oddatas['id'];
                $oddata['product_name'] = $oddatas['name'];
                $oddata['product_price'] = $oddatas['price'];
                $oddata['product_sales_quantity'] = $oddatas['qty'];
                $oddata['product_image'] = $oddatas['options']['product_image'];
                $this->web_model->save_order_details_info($oddata);
            }

            //if ($payment_method == 'rekeningbank') {
                
            //}
            //if ($payment_method == 'cashon') {
                
            //}

            redirect('payment');
            
        } else {
            $this->session->set_flashdata('message', validation_errors());
            redirect('checkout');
        }
    }

    public function pdf($order_id) {
        $data = array();
        $order_info = $this->manageorder_model->order_info_by_id($order_id);
        $customer_id = $order_info->customer_id;
        $shipping_id = $order_info->shipping_id;
        $payment_id = $order_info->payment_id;


        $data['customer_info'] = $this->manageorder_model->customer_info_by_id($customer_id);
        $data['shipping_info'] = $this->manageorder_model->shipping_info_by_id($shipping_id);
        $data['payment_info'] = $this->manageorder_model->payment_info_by_id($payment_id);
        $data['order_details_info'] = $this->manageorder_model->orderdetails_info_by_id($order_id);
        $data['order_info'] = $this->manageorder_model->order_info_by_id($order_id);

        $this->load->library('pdf');
        $this->pdf->load_view('admin/pages/pdf', $data);
        $this->pdf->setPaper('A4', 'portrait');
        $this->pdf->render();
        $this->pdf->stream("orderankamu.pdf");
    }

    public function search() {

        $search = $this->input->get('search');
        
        if(!empty($search)){
            $data = array();
			$data['get_all_category'] = $this->web_model->get_all_category();
            $data['get_all_product'] = $this->web_model->get_all_search_product($search);
            $data['search'] = $search;

            if ($data['get_all_product']) {
                $this->load->view('web/inc/header', $data);
                $this->load->view('web/pages/search', $data);
                $this->load->view('web/inc/footer');
            } else {
                redirect('error');
            }
        }
        else {
                redirect('error');
            }
    }
    
    function logout(){
        $this->session->unset_userdata('customer_id');
        $this->session->unset_userdata('customer_email');
        redirect('customer/login');
    }

}
