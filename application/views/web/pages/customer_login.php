

<div class="main">
    <div class="content" style="text-align: center">
         <div class="login_panel" style="width:400px;text-align:center;display:inline-block;float: none">
            <h3>Login Pelanggan</h3>
            <p>Isi Form Dibawah Untuk Log In</p>
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <form action="<?php echo base_url('customer/logincheck');?>" method="post">
                <input name="customer_email" placeholder="Masukkan Email Kamu" type="text"/>
                <input name="customer_password" placeholder="Masukkan Password Kamu" type="password"/>
                <!--<p class="note">If you forgot your passoword just enter your email and click <a href="#">here</a></p>-->
                <div class="buttons"><div><button class="grey">Sign In</button></div></div>
            </form>
        </div>	
        <div class="clear"></div>
    </div>
</div>