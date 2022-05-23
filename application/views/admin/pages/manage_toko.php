<!-- start: Content -->
<div id="content" class="span10">


    <ul class="breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="<?php echo base_url('dashboard')?>">Home</a> 
            <i class="icon-angle-right"></i>
        </li>
        <li><a href="<?php echo base_url('manage/product')?>">Manage Toko</a></li>
    </ul>

    <div class="row-fluid sortable">		
        <div class="box span12">
            <div class="box-header" data-original-title>
                <h2><i class="halflings-icon user"></i><span class="break"></span>Manage Toko</h2>
                <div class="box-icon">
                    <a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
                    <a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
                    <a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
                </div>
            </div>
            
            <style type="text/css">
                #result{color:red;padding: 5px}
                #result p{color:red}
            </style>
            &emsp;
            <p align="left">
                <a href="<?php echo base_url('add/user')?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus glyphicon-white"></i> Tambah Pemilik Toko</a>
              </p>
            <div id="result">
                <p><?php echo $this->session->flashdata('message'); ?></p>
            </div>
            
            <div class="box-content">
                <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Toko</th>
                            <th>Email</th>
                            <th>Waktu Dibuat</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($user as $pemilik_toko){
                            $i++;
                        ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td class="center"><?php echo $pemilik_toko->user_name;?></td>
                            <td class="center"><?php echo $pemilik_toko->user_email;?></td>
                            <td class="center"><?php echo $pemilik_toko->created_time;?></td>
                            
                           <td class="center">
                                    <a class="btn btn-info" href="<?php echo base_url('edit/user/' . $pemilik_toko->user_id); ?>">
                                        <i class="halflings-icon white edit"></i>  
                                    </a>
                                    <a class="btn btn-danger" href="<?php echo base_url('delete/user/' . $pemilik_toko->user_id); ?>">
                                        <i class="halflings-icon white trash"></i> 
                                    </a>
                                </td>
                        </tr>
                        <?php }?>
                        
                    </tbody>
                </table>            
            </div>
        </div><!--/span-->

    </div><!--/row-->



</div><!--/.fluid-container-->

<!-- end: Content -->