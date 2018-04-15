

<?php 

include('LV_queries.php'); 
include('connect.config.php');
include('support/function.php');
session_start();







if(isset($_POST["generate_invoice"]))

{
    

    $get_value = $_POST["generate_invoice"];
$get_value;

$xQx_update = "UPDATE invoices SET Status = '1' WHERE invoiceId = '$get_value'";
 $query_update=mysqli_query($conn,$xQx_update);


?>

    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>




    <?php 




}












if(isset($_POST["invoice_paid"]))

{
    

    $get_value = $_POST["invoice_paid"];

$xQx_update = "UPDATE invoices SET Status = '2' WHERE invoiceId = '$get_value'";
 $query_update=mysqli_query($conn,$xQx_update);


?>





    <script>   
    window.location.href="admin.php?x=GENERATED%20INVOICE";
    </script>




    <?php 




}








?>
