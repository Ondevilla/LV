<?php
include('LV_queries.php'); 
include('connect.config.php');

session_start();

//////SESSION ALL VALUES AFTER QUERY
$catch_invoiceId =  $_SESSION["get_invoiceId"];




 $xQx_get_details = "SELECT * FROM invoices WHERE invoiceId = $invoice_id AND isDeleted = '0'";
  $query_get_details=mysqli_query($conn,$xQx_get_details);         


                      while($row=mysqli_fetch_array($query_get_details))

                      { 

                        $clientId = $row["clientId"];
                        $bustypeId = $row["bustypeId"];
                        $invoiceStatId = $row["invoiceStatId"];
                        $clientName = $row["clientName"];
                        $bustypeName = $row["bustypeName"];


                      }

 $xQx_get_cname = "SELECT * FROM clients WHERE clientId = $clientId";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 


                        $checkVat = $row["tax_status"];

                      }















?>