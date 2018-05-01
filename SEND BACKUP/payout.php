<?php
include('LV_queries.php'); 
include('connect.config.php');

session_start();

//////SESSION ALL VALUES AFTER QUERY
     
$catch_invoiceId =  $_SESSION["get_invoiceId"];

$paid_amount = $_POST["paid_amount"];
$total_amount = $_POST["total_amount"];

$get_user = $_SESSION["u_id"];


 $xQx_update = "UPDATE invoices SET Status = '2' WHERE invoiceId = '$catch_invoiceId'";
  $query_update=mysqli_query($conn,$xQx_update);

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



  $que=mysqli_query($conn,"SELECT i.`assetName` FROM items_ordered i LEFT JOIN invoices a ON a.`invoiceId`=i.`invoiceId` WHERE i.`invoiceId`='".$catch_invoiceId."' AND i.`isDeleted`='0'");
  while ($row=mysqli_fetch_array($que)) {
        $xQx = "UPDATE assetstwo ";
        $xQx .=  "SET status = 'pullout' ";
        $xQx .=  "WHERE serialName='".$row[0]."'";
        $query=mysqli_query($conn,$xQx);

  }
  



  $xQx_insertReport = "INSERT INTO reportsclientorder (invoiceId, invoiceStatId, clientId, clientName, bustypeId, bustypeName, total_amount, amount_paid, handledBy, date_paid) VALUES ('$invoiceId','$invoiceStatId','$clientId','$clientName','$bustypeId','$bustypeName','$total_amount','$paid_amount','$user_name','$date')";
  $query_insertReport=mysqli_query($conn,$xQx_insertReport);  



?> 













    <script>   
    window.location.href="admin.php?x=PAID%20INVOICE";
    </script> 


    <?php












?>