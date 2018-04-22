
<html>
<head>
    <title>LIGHTVEND | PROCESS</title>


  <script type="text/javascript" src="sm/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sm/dist/sweetalert.css"/>

</head>
<body>
<?php 

include('LV_queries.php'); 
include('connect.config.php');
include('support/function.php');
session_start();







if(isset($_POST["generate_invoice"]))

{
    

    $get_value = $_POST["generate_invoice"];


$sql = "SELECT * FROM items_ordered WHERE invoiceId = '".$get_value."' and isDeleted='0'  ";
$res = mysqli_query($conn,$sql);
$num_row = mysqli_num_rows($res);
if(empty($num_row))
{


?>
<script>   
   


       swal({
                  title: "Invoice !",
                  text: "Invoice does not contain any items !",
                  type: "error",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=NEW%20INVOICE';
                    }, 1000);
                });
</script>
<?php

}


else
{


$xQx_update = "UPDATE invoices SET Status = '1' WHERE invoiceId = '$get_value'";
 $query_update=mysqli_query($conn,$xQx_update);

  
  ?>
 <script>   


       swal({
                  title: "Invoice !",
                  text: "Successfully generate an invoice !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=NEW%20INVOICE';
                    }, 1000);
                });
</script>
   


    <?php  
}






}




















?>

</body>
</html>
