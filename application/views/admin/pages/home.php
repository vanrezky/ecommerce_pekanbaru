<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashoard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="#">Dashboard</a></li>
    </ul>

        <div class="row-fluid"> 

        <a class="quick-button metro yellow span2">
            <i class="icon-group"></i>
            <p>Users</p>
            <span class="badge"><?php $jumlah = $this->db->get('tbl_customer')->num_rows(); echo $jumlah?></span>
        </a>
        <a href="<?php echo base_url('manage/category')?>" class="quick-button metro red span2">
            <i class="icon-comments-alt"></i>
            <p>Kategori</p>
            <span class="badge"><?php $jumlah = $this->db->get('tbl_category')->num_rows(); echo $jumlah?></span>

        </a>
        <a href="<?php echo base_url('manage/order')?>" class="quick-button metro blue span2">
            <i class="icon-shopping-cart"></i>
            <p>Orders</p>
            <span class="badge"></span>
            <!--<?php $jumlah = $this->db->get('tbl_order')->num_rows(); echo $jumlah?>
                <?php $jumlah = $this->db->get('tbl_product')->num_rows(); echo $jumlah?>
                <?php $jumlah = $this->db->get('tbl_user')->num_rows(); echo $jumlah?>

            -->
        </a>
        <a href="<?php echo base_url('manage/product')?>" class="quick-button metro green span2">
            <i class="icon-barcode"></i>
            <p>Products</p>
            <span class="badge"></span>
        </a>
        <a class="quick-button metro pink span2">
            <i class="icon-group"></i>
            <p>Pemilik Toko</p>
            <span class="badge"></span>
        </a>

        <div class="clearfix"></div>

    </div><!--/row-->
<!--
    &emsp;
    <div class="row-fluid">

        <div class="span3 statbox purple" onTablet="span6" onDesktop="span3">
            <div class="boxchart">5,6,7,2,0,4,2,4,8,2,3,3,2</div>
            <div class="number">854<i class="icon-arrow-up"></i></div>
            <div class="title">visits</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>	
        </div>
        <div class="span3 statbox green" onTablet="span6" onDesktop="span3">
            <div class="boxchart">1,2,6,4,0,8,2,4,5,3,1,7,5</div>
            <div class="number">123<i class="icon-arrow-up"></i></div>
            <div class="title">sales</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox blue noMargin" onTablet="span6" onDesktop="span3">
            <div class="boxchart">5,6,7,2,0,-4,-2,4,8,2,3,3,2</div>
            <div class="number">982<i class="icon-arrow-up"></i></div>
            <div class="title">orders</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>
        <div class="span3 statbox yellow" onTablet="span6" onDesktop="span3">
            <div class="boxchart">7,2,2,2,1,-4,-2,4,8,,0,3,3,5</div>
            <div class="number">678<i class="icon-arrow-down"></i></div>
            <div class="title">visits</div>
            <div class="footer">
                <a href="#"> read full report</a>
            </div>
        </div>	

    </div>	-->	

&emsp;

		



 





</div><!--/.fluid-container-->

<!-- end: Content -->