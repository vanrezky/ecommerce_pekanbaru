

<div class="main">
    <div class="content">
        <div class="support">
            <div class="support_desc">
                <h3><?php echo get_option('contact_title');?></h3>
                <p><?php echo get_option('contact_subtitle');?></p>
                <p><?php echo get_option('contact_description');?></p>
            </div>
            <img src="<?php echo base_url()?>assets/web/images/contact.png" alt="" />
            <div class="clear"></div>
        </div>
        <div class="section group">
            <div class="col span_2_of_3">
                <div class="contact-form">
                    <h2>Contact Us</h2>
                    <form>
                        <div>
                            <span><label>NAMA</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>E-MAIL</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>NO. TELP</label></span>
                            <span><input type="text" value=""></span>
                        </div>
                        <div>
                            <span><label>SUBJECT</label></span>
                            <span><textarea> </textarea></span>
                        </div>
                        <div>
                            <span><input type="submit" value="SUBMIT"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>    	
    </div>
</div>
