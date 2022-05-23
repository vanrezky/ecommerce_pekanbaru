

<div class="main">
    <div class="content">
        <div class="cartoption">		
            <div class="cartpage">
                <h2>Riwayat Transaksi</h2>
                    <table class="tblone">
                 <thead>
                        <tr>
                            <th>No.</th>
                            <th>Tanggal Orderan</th>
                            <th>Total Pembayaran</th>
                            <th>Actions</th>
                        </tr>
                    </thead>   
                    <tbody>
                        <?php 
                        $i=0;
                        foreach($all_manage_riwayat_info as $single_order){
                            $i++;
                            ?>
                        <tr>
                            <td><?php echo $i;?></td>
                            <td><?php echo $single_order->date_order?></td>
                            <td>RP <?php echo $this->cart->format_number($single_order->order_total)?></td>
                            <td>
                                <a class="btn btn-danger" href="<?php echo base_url('web/details/'.$single_order->order_id);?>">View</a>
                                <a class="btn btn-success" href="<?php echo base_url('web/pdf/'.$single_order->order_id);?>">Download</a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                    </table>
            </div>
        </div>  	
        <div class="clear"></div>
    </div>
    </div>

    

