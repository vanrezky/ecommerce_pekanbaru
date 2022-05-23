<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce Pekanbaru</title>
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/img/logo.png" />

    <style type="text/css" media="print">
        @page {
            size: auto;
            margin: 0 auto 0 auto;
        }
    </style>
    <!-- Google Fonts -->
    <link  href='https://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/payment/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/payment/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/payment/css/responsive.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<?php
//include "include/head.php";
?>

<br/><br/>

<div class="container well">
    <div id="print">
        <div class="">
            <span style="float: left;">
                <b>E-commerce Pekanbaru</b><br/>
                <i>shop #111 <br/>1<sup>st</sup> Pekanbaru</i>
            </span>
            <span style="float: right;">
                <b>Contact no:</b><br/>

                <span>
                    <b> Irsyad </b> 03162658853
                </span>

            </span>
            <br/><br/><br/>
            <div>
                <div>
                    <center>
                        <h1><span style="color: gray;">Resi</span> <span style="color:#1abc9c;">Pembayaran</span></h1>
                        <br/>
                        <!--<span> <b>Customer Name :</b> <?php echo $_SESSION['costumer_name'] ?> </span>-->
                    </center>
                    
                </div>
                <br/>
                <div class="table ">
                    <table align="center" class="table table-hover table-responsive col-md-12">
                        <thead>
                        <tr>
                            <th>Jumlah</th>
                            <th colspan="3">Nama Produk</th>
                            <th>harga Produk</th>
                            <th>Total</th>
                        </tr>

                        </thead>
                        <tbody>
                         <?php
                        $i = 0;
                        foreach ($cart_contents as $cart_items) {
                            $i++;
                            ?>
                                <tr>
                                    <td></td>
                                    <td colspan="3" ><?php echo $cart_items['name'] ?></td>
                                    <td>Rp. <?php echo $this->cart->format_number($cart_items['price']) ?></td>
                                    <td>Rp. <?php echo $this->cart->format_number($cart_items['subtotal']) ?></td>
                                </tr>
                                <?php
                            }
                        
                             ?>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2"><b>SubTotal :</b></td>
                            <td><b>Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></b></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2"><b>Biaya Pengiriman :</b></td>
                            <td>Rp. 
                                <?php
                                $total = $this->cart->total();
                                $tax = ($total * 5) / 100;
                                echo $this->cart->format_number($tax);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td colspan="2"><b>Grand Bayar</b></td>
                            <td>Rp. <?php echo $this->cart->format_number($tax + $this->cart->total()); ?> </td>
                        </tr>

                        </tbody>
                    </table>
                </div>
                &emsp;
                &emsp;
                &emsp;
                &emsp;
                &emsp;
                <p><u>Transfer Via Bank Riau</u></p>
                    <span>0912347183913812</span>
                    <p><b>A/N : Ecommerce Grosir Pekanbaru</b></p>
            </div>
        </div>
    </div>
                <button onclick="printDiv('print')" id="printpagebutton1" class="btn btn-link"><span><i class="fa fa-print"></i> Print</span></button>

                <center><a href="<?php echo base_url() ?>web"><button class="btn btn-primary" id="printpagebutton" >Back to Home</button></a></center>



</div>

<script>
    function myFunc(){
        var printButton = document.getElementById("printpagebutton");
        var printButton1 = document.getElementById("printpagebutton1");
        //Set the print button visibility to 'hidden'
        printButton.style.visibility = 'hidden';
        printButton1.style.visibility = 'hidden';

        window.print();

        printButton.style.visibility = 'visible';
        printButton1.style.visibility = 'visible';
    }
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;

        document.body.innerHTML = printContents;

        window.print();

        document.body.innerHTML = originalContents;
    }
</script>

<?php
//include "include/footer.php";
?>
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>

<!-- Bootstrap JS form CDN -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<!-- jQuery sticky menu -->
<script src="<?php echo base_url() ?>assets/payment/js/owl.carousel.min.js"></script>
<script src="<?php echo base_url() ?>assets/payment/js/jquery.sticky.js"></script>

<!-- jQuery easing -->
<script src="<?php echo base_url() ?>assets/payment/js/jquery.easing.1.3.min.js"></script>

<!-- Main Script -->
<script src="<?php echo base_url() ?>assets/payment/js/main.js"></script>
</body>
</html>