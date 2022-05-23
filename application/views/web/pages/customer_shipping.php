

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Alamat Penerima Barang</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save/shipping/address');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="shipping_name" placeholder="Masukkan Nama">
                                </div>


                                <div>
                                    <input type="text" name="shipping_city" placeholder="Masukkan Kota">
                                </div>
                                <div>
                                    <input type="text" name="shipping_phone" placeholder="Masukkan No Telp">
                                </div>
                                <div>
                                    <input type="text" name="shipping_zipcode" placeholder="Masukkan Kodepos">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="shipping_email" placeholder="Masukkan Email">
                                </div>
                                        

                                <div>
                                    <input type="text" name="shipping_address" placeholder="Masukkan Alamat Spesifik">
                                </div>
                                
                                <div>
                                    <select id="country" name="shipping_country" class="frm-field required">
                                        <option value="null">Pilih Daerah</option>         
                                        <option value="Bukit Raya">Bukit Raya</option>
                                        <option value="Lima puluh">Lima puluh</option>
                                        <option value="Marpoyan Damai">Marpoyan Damai</option>
                                        <option value="Payung Sekaki">Payung Sekaki</option>
                                        <option value="Pekanbaru Kota">Pekanbaru Kota</option>
                                        <option value="Rumbai">Rumbai</option>
                                        <option value="Rumbai Pesisir">Rumbai Pesisir</option>
                                        <option value="Sail">Sail</option>
                                        <option value="Senapelan">Senapelan</option>
                                        <option value="Sukajadi">Sukajadi</option>
                                        <option value="Tampan">Tampan</option>
                                        <option value="Tenayan Raya">Tenayan Raya</option>
                                        <option value="Pkl Kerinci">Pkl Kerinci</option>

                                    </select>
                                </div>		

                                
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Kirim</button></div></div>
                <p class="terms">By clicking 'Create Account' you agree to the <a href="#">Terms &amp; Conditions</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>