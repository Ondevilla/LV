<?php
include('LV_queries.php'); 
include('connect.config.php');

session_start();

//////SESSION ALL VALUES AFTER QUERY
     
$catch_invoiceId =  $_SESSION["get_invoiceId"];

$paid_amount = $_POST["paid_amount"];
$total_amount = $_POST["total_amount"];

$get_user = $_SESSION["u_id"];



  $xQx_insert = "SELECT * FROM 	useraccount WHERE user_Id = '$get_user'";
  $query_insert=mysqli_query($conn,$xQx_insert);         


                      while($row=mysqli_fetch_array($query_insert))

{

			$user_name = $row["user_name"];
}


  $xQx_insert = "SELECT * FROM 	invoices WHERE invoiceId = '$catch_invoiceId'";
  $query_insert=mysqli_query($conn,$xQx_insert);         


                      while($row=mysqli_fetch_array($query_insert))

{

					$invoiceId = $row["invoiceId"];
					$invoiceStatId = $row["invoiceStatId"];
					$clientId = $row["clientId"];
					$clientName = $row["clientName"];
					$bustypeId = $row["bustypeId"];
					$bustypeName = $row["bustypeName"];


}

	/*		$invoiceId = $invoiceId_catch;
*/

  $date = date('Y-m-d');



  $xQx_insertReport = "INSERT INTO reportsclientorder (invoiceId, invoiceStatId, clientId, clientName, bustypeId, bustypeName, total_amount, amount_paid, handledBy, date_paid) VALUES ('$invoiceId','$invoiceStatId','$clientId','$clientName','$bustypeId','$bustypeName','$total_amount','$paid_amount','$user_name','$date')";
  $query_insertReport=mysqli_query($conn,$xQx_insertReport);  

  $xQx_update = "UPDATE invoices SET isDeleted = '1' WHERE invoiceId = '$catch_invoiceId'";
  $query_update=mysqli_query($conn,$xQx_update);  

?> 













    <script>   
    window.location.href="admin.php?x=SALES%20INVOICES";
    </script> 


    <?php












?>