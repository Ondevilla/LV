<?php 
session_start();
include("connect.config.php");


if(!empty($_POST["positionname"]))
{


$client_id = $_POST["positionname"];



  $xQx_get_cname = "SELECT * FROM businesstypes WHERE busTypeId ='$client_id'";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 


                      	$get_name =  $row[1];
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
     
