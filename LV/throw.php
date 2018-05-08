
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
















if(isset($_POST["editService"]))


{

    $get_id = $_POST["getService_id"];

    if(!empty($_POST["editServices_name"]))
{
  $name = $_POST["editServices_name"];

        $xQx_update = "UPDATE services SET services_name = '$name' WHERE services_id = '$get_id'";
        $query_update=mysqli_query($conn,$xQx_update);


}


    if(!empty($_POST["editServices_quantity"]))
{
  $quantity = $_POST["editServices_quantity"];

        $xQx_update = "UPDATE services SET sell_price = '$quantity' WHERE services_id = '$get_id'";
        $query_update=mysqli_query($conn,$xQx_update);
  
}


?>
 <script>   


       swal({
                  title: "Success !",
                  text: "Services Updated !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=SERVICES';
                    }, 1000);
                });
</script>

<?php





}



if(isset($_POST["delServices"]))


{


      $getid = $_POST["supId"]; 
        $xQx_update = "UPDATE services SET isDeleted = '1' WHERE services_id = '$getid'";
        $query_update=mysqli_query($conn,$xQx_update);





?>
 <script>   


       swal({
                  title: "Success !",
                  text: "Services Deleted !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=SERVICES';
                    }, 1000);
                });
</script>

<?php

}


if(isset($_POST["addService"]))


{

$service_name = $_POST["service_name"];
$service_price = $_POST["service_price"];



        $xQx_insert = "INSERT INTO services (services_name, sell_price, unit, quantity, isDeleted) VALUES ('$service_name','$service_price','LOT','1','0')";
        $query_insert=mysqli_query($conn,$xQx_insert);





?>
 <script>   


       swal({
                  title: "Success !",
                  text: "Services Added !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=SERVICES';
                    }, 1000);
                });
</script>

<?php

}
?>

</body>
</html>
