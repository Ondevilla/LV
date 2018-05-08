<?php
include('LV_queries.php'); 
include('connect.config.php');

session_start();

//////SESSION ALL VALUES AFTER QUERY
     
$catch_invoiceId =  $_SESSION["get_invoiceId"];

(int)$paid_amount = $_POST["paid_amount"];
(int)$total_amount = $_POST["total_amount"];

$get_user = $_SESSION["u_id"];




if($paid_amount < $total_amount)
{

 
             
        $xQx_select_balance = "SELECT * FROM invoices WHERE invoiceId = '$catch_invoiceId' AND isDeleted = '0'";
        $query_select_balance=mysqli_query($conn,$xQx_select_balance);
                

                      while($row=mysqli_fetch_aSSOC($query_select_balance))

                      {  



/*$sp[].=$row["sellPrice"];*/

(int)$catch_balance = $row["balance"];


}



$balance = $total_amount - $paid_amount;
echo $balance;
        $xQx_update_new = "UPDATE invoices SET balance = '$balance' WHERE invoiceId = '$catch_invoiceId'";
        $query_update_new=mysqli_query($conn,$xQx_update_new);

        date_default_timezone_set('Asia/manila');
        $D=date("Y-m-d");
        $xQx_insert_new = "INSERT INTO payment_terms (invoice_id,date_paid,amount_paid,handledBy,isDeleted) VALUES ('$catch_invoiceId','$D','$paid_amount','$get_user','0')";
        $query_insert_new=mysqli_query($conn,$xQx_insert_new);





}

else

{

        $xQx_balance = "UPDATE invoices SET balance = '0' WHERE invoiceId = '$catch_invoiceId'";
        $query_balance=mysqli_query($conn,$xQx_balance);

        date_default_timezone_set('Asia/manila');
        $D=date("Y-m-d");
        $xQx_insert_new = "INSERT INTO payment_terms (invoice_id,date_paid,amount_paid,handledBy,isDeleted) VALUES ('$catch_invoiceId','$D','$paid_amount','$get_user','0')";
        $query_insert_new=mysqli_query($conn,$xQx_insert_new);




 $xQx_update = "UPDATE invoices SET Status = '2' WHERE invoiceId = '$catch_invoiceId'";
  $query_update=mysqli_query($conn,$xQx_update);

  $xQx_insert = "SELECT * FROM  useraccount WHERE user_Id = '$get_user'";
  $query_insert=mysqli_query($conn,$xQx_insert);         


                      while($row=mysqli_fetch_array($query_insert))

{

      $user_name = $row["user_name"];
}


  $xQx_insert = "SELECT * FROM  invoices WHERE invoiceId = '$catch_invoiceId'";
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

  /*    $invoiceId = $invoiceId_catch;
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


       swal({
                  title: "Success !",
                  text: "Invoice has been fully paid !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },


                function(){
                  setTimeout(function(){
                      window.location.href='admin.php?x=PAID%20INVOICE';
                    }, 1000);
                });
</script>


    <?php



}

?>