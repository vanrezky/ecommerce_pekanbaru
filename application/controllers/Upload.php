<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends CI_Controller {

  public function __construct(){
    parent::__construct();
  
    $this->load->helper(array('text','url'));
}

public function simpan_ubah()
    {

            $id['order_id'] = $this->input->post("id_param");
            $st_frame = $this->input->post("frame");
            
                $st = $this->input->post('st');
                if($st=="edit")
                {
                    $upd['customer_id'] = $this->input->post('customer_id');

                    if(!empty($_FILES['userfile']['name']))
                    {
                        $acak=rand(00000000000,99999999999);
                        $bersih=$_FILES['userfile']['name'];
                        $nm=str_replace(" ","_","$bersih");
                        $pisah=explode(".",$nm);
                        $nama_murni_lama = preg_replace("/^(.+?);.*$/", "\\1",$pisah[0]);
                        $nama_murni=date('Ymd-His');
                        $ekstensi_kotor = $pisah[1];
                        
                        $file_type = preg_replace("/^(.+?);.*$/", "\\1", $ekstensi_kotor);
                        $file_type_baru = strtolower($file_type);
                        
                        $ubah=$acak.'-'.$nama_murni; //tanpa ekstensi
                        $n_baru = $ubah.'.'.$file_type_baru;
                        
                        $config['upload_path']  = "./assets/file_foto/";
                        $config['allowed_types']= 'gif|jpg|png|jpeg|pdf';
                        $config['file_name'] = $n_baru;
                        $config['max_size']     = '0';
                        $config['max_width']    = '0';
                        $config['max_height']   = '0';
                 
                        $this->load->library('upload', $config);
                 
                        if ($this->upload->do_upload("userfile")) {
                            $data       = $this->upload->data();
                 
                            /* PATH */
                            $source             = "./assets/file_foto/".$data['file_name'] ;
                            $destination_thumb  = "./assets/file_foto/thumb/" ;
                            $destination_medium = "./assets/file_foto/medium/" ;
                 
                            // Permission Configuration
                            chmod($source, 0777) ;
                 
                            /* Resizing Processing */
                            // Configuration Of Image Manipulation :: Static
                            $this->load->library('image_lib') ;
                            $img['image_library'] = 'GD2';
                            $img['create_thumb']  = TRUE;
                            $img['maintain_ratio']= TRUE;
                 
                            /// Limit Width Resize
                            $limit_medium   = 425 ;
                            $limit_thumb    = 220 ;
                 
                            // Size Image Limit was using (LIMIT TOP)
                            $limit_use  = $data['image_width'] > $data['image_height'] ? $data['image_width'] : $data['image_height'] ;
                 
                            // Percentase Resize
                            if ($limit_use > $limit_medium || $limit_use > $limit_thumb) {
                                $percent_medium = $limit_medium/$limit_use ;
                                $percent_thumb  = $limit_thumb/$limit_use ;
                            }
                 
                            //// Making THUMBNAIL ///////
                            $img['width']  = $limit_use > $limit_thumb ?  $data['image_width'] * $percent_thumb : $data['image_width'] ;
                            $img['height'] = $limit_use > $limit_thumb ?  $data['image_height'] * $percent_thumb : $data['image_height'] ;
                 
                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%' ;
                            $img['source_image'] = $source ;
                            $img['new_image']    = $destination_thumb ;
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                 
                            ////// Making MEDIUM /////////////
                            $img['width']   = $limit_use > $limit_medium ?  $data['image_width'] * $percent_medium : $data['image_width'] ;
                            $img['height']  = $limit_use > $limit_medium ?  $data['image_height'] * $percent_medium : $data['image_height'] ;
                 
                            // Configuration Of Image Manipulation :: Dynamic
                            $img['thumb_marker'] = '';
                            $img['quality']      = '100%' ;
                            $img['source_image'] = $source ;
                            $img['new_image']    = $destination_medium ;
                            
                            $upd['foto'] = $data['file_name'];
                 
                            // Do Resizing
                            $this->image_lib->initialize($img);
                            $this->image_lib->resize();
                            $this->image_lib->clear() ;
                        }
                    }
                    
                    
                    $this->db->update("tbl_order",$upd,$id);
                    
                     $this->session->set_flashdata('message','<div class="alert alert-success" role="alert"> Data Berhasil diubah <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

                    redirect('get_riwayat');

                }
        }

}     