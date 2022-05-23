

<div class="main">
    <div class="content">
        <div class="cartoption">		
            <div class="cartpage">
                    <table class="tblone">
                        <div class="box-content">

            <div id="result">
                <p><?php echo $this->session->flashdata('message');?></p>
            </div>
            <!--
            <div class="control-group">
                <?php echo form_open_multipart('upload/simpan_ubah');?>
                            <div class="form-group">
                            <label for="varchar">Customer Id</label>
                            <input type="text" class="form-control" name="customer_id" value="<?php echo $customer_id; ?>"/>
                      </div>
                    <div class="form-group">
                       <label for="userfile">Upload Gambar</label>
                    <input type="file" name="userfile" id="userfile" value="<?php echo $foto; ?>"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="<?php echo site_url('get_riwayat') ?>" <button type="reset" class="btn btn-success">Batal</button></a>
                    <input type="hidden" name="id_param" value="<?php echo $id_param; ?>">
                    <input type="hidden" name="st" value="<?php echo $st; ?>">   
                        
                  </div>

                  <?php echo form_close(); ?>


                <div class="shopright">
                    <a> <img src = "<?php echo base_url() ?>assets/web/images/upload.png" alt = "" /></a>
                </div>-->
                <div class="span4 text-left">

                    <table class="table table-striped table-bordered">
                    </table>
                </div>
                <div class="span4"></div>
                <div class="span4 text-right" class="table table-striped table-bordered">
                    <h2>Pelanggan Info(00<?php echo $shipping_info->shipping_id; ?>)</h2>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <td>Nama Penerima : </td>
                            <td><?php echo $shipping_info->shipping_name; ?></td>
                        </tr>
                        <tr>
                            <td>Alamat Penerima : </td>
                            <td><?php echo $shipping_info->shipping_address; ?></td>
                        </tr>
                        <tr>
                            <td>Telp Penerima : </td>
                            <td><?php echo $shipping_info->shipping_phone; ?></td>
                        </tr>
                        <tr>
                            <td>Email Penerima : </td>
                            <td><?php echo $shipping_info->shipping_email; ?></td>
                        </tr>
                    </table>
                </div>

                <table class="tblone">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Produk</th>
                            <th>Gambar Produk</th>
                            <th>Harga Produk</th>
                            <th>Banyak Produk</th>
                            <th>Sub Pembayaran</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($order_details_info as $single_order_details) {
                            $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $single_order_details->product_name ?></td>
                                <td><img src="<?php echo base_url('uploads/'.$single_order_details->product_image);?>" style="width:200px;height:100px"/></td>
                                <td>RP <?php echo $this->cart->format_number($single_order_details->product_price)?></td>
                                <td><?php echo $single_order_details->product_sales_quantity ?></td>
                                <td>RP <?php echo $this->cart->format_number($single_order_details->product_price * $single_order_details->product_sales_quantity) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfooter>
                        <td colspan="5">Total Pembayaran</td>
                        <td>=RP <?php echo $this->cart->format_number($order_info->order_total)?></td>
                    </tfooter>
                </table>            
            </div>
  
            
                    </table>
            </div>
        </div>  	
        <div class="clear"></div>
    </div>
    </div>

<script>
document.formName.product_feature.value=<?php echo $riwayat_info_by_id->product_feature;?>;
</script>