

<div class="main">
    <div class="content">
        <div class="login_panel">
            <h3>Sudah Punya Akun ?</h3>
            <p>Silahkan Login Terlebih Dahulu</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('messagelogin'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/shipping/login');?>" method="post">
                <input name="customer_email" placeholder="Masukkan Email!" type="text" required />
                <input name="customer_password" placeholder="Masukkan Password" type="password" required/>
                <!--<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>-->
                <div class="buttons"><div><button class="grey">Login</button></div></div>
            </form>
        </div>
        <div class="register_account">
            <h3>Daftar Akun Baru</h3>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            <form method="post" action="<?php echo base_url('customer/shipping/register');?>">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <div>
                                    <input type="text" name="customer_name" placeholder="Masukkan Nama Anda" required>
                                </div>

                                <div>
                                    <input type="text" name="customer_password" placeholder="Masukkan Password Anda" required>

                                </div>

                                <div>
                                    <input type="text" name="customer_city" placeholder="Masukkan Kota Anda" required>
                                </div>
                                <div>
                                    <input type="text" name="customer_phone" placeholder="Masukkan Nomor Telp" required>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <input type="text" name="customer_email" placeholder="Masukkan Email Anda" required>
                                </div>
                                        

                                <div>
                                    <input type="text" name="customer_address" placeholder="Masukkan Alamat Anda" required>
                                </div>
                                
                                <div>
                                    <select id="country" name="customer_country" class="frm-field required" required>
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
                                        <option value="Tenayan Raya">Pkl Kerinci</option>

                                    </select>
                                </div>		

                                <div>
                                    <input type="text" name="customer_zipcode" placeholder="Masukkan Kode Pos" required>
                                </div>
                            </td>
                        </tr> 
                    </tbody></table> 
                <div class="search"><div><button class="grey">Daftar</button></div></div>
                <p class="terms">Dengan mengklik Daftar Kamu Setuju dengan syarat ketentuan yang berlaku <a href="#">syart &amp; ketentuan</a>.</p>
                <div class="clear"></div>
            </form>
        </div>  	
        <div class="clear"></div>
    </div>
</div>