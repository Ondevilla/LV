<?php
include('LV_queries.php'); 
include('connect.config.php');

session_start();

//////SESSION ALL VALUES AFTER QUERY
     
$catch_invoiceId =  $_SESSION["get_invoiceId"];

(int)$paid_amount = $_POST["paid_amount"];
(int)$total_amount = $_POST["total_amount"];

$get_user = $_SESSION["u_id"];


$change = $paid_amount - $total_amount;

if($paid_amount < $total_amount)
{

 












}







?>