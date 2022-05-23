

<div class="main">
    <div class="content" style="text-align: center">
        <div class="register_account" style="text-align:center;display:inline-block;float: none">
            <h3>Daftar Akun Baru</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/save');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" placeholder="Masukkan Nama Kamu">
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Masukkan Password">

                                </div>

                                <div>
                                    <input type="text" name="customer_city" placeholder="Masukkan Kota">
                                </div>
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Masukkan Telepon">
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_email" placeholder="Masukkan Email">
                                </div>
                                        

                                <div>
                                    <input type="text" name="customer_address" placeholder="Masukkan Alamat">
                                </div>
                                
                                <div>
                                    <select id="country" name="customer_country" class="frm-field required">
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

                                    </select>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Masukkan Kode Pos">
                                </div>
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Create Account</button></div></div>
                <p class="terms">Dengan Mendaftar, Kamu Setuju Dengan <a href="#">Terms &amp; Conditions</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>