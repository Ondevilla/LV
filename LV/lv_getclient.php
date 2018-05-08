<?php 
session_start();
include("connect.config.php");


if(!empty($_POST["positionname"]))
{


$client_id = $_POST["positionname"];



  $xQx_get_cname = "SELECT b.`busTypeName` FROM businesstypes b INNER JOIN clients c  ON c.`busTypeId`=b.`busTypeId` WHERE c.`clientId`='$client_id'  AND c.`isDeleted`='0'";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 


                      	$get_name =  $row[0];
                      }

if(empty($get_name))
{
	echo "N/A";
}
else
{
echo $get_name;
}
}







?>
     
