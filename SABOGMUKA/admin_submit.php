<!DOCTYPE html>
<html>
<head>
  <title>LIGHTVEND | LOGIN</title>


  <script type="text/javascript" src="sm/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="sm/dist/sweetalert.css"/>
</head>
<body>


<?php 
include('connect.config.php');
include('support/function.php');

session_start();

if(isset($_POST["Login"]))
{
$username = $_POST["user"];
$password = $_POST["pass"];




$row=mysqli_query($conn,'SELECT * From `useraccount` WHERE `user_name`="'.$username.'" AND `user_password`="'./*encryptIt*/( $password ).'" and isActive="1" ');
$search=mysqli_fetch_assoc($row);

  $_SESSION['fn']=$search['user_name'];
  $_SESSION["u_id"] = $search["user_id"];

  $_SESSION["access"] = $search["accessright"];

  if (!empty($search) )
  {


?> 


<script type="text/javascript">

    swal({
                  title: "Success !",
                  text: "Successfully Logged in !",
                  type: "success",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },
                function(){
                  setTimeout(function(){
                    
window.location.href="admin.php?x=";
                    }, 1000);
              
                });


</script>

<?php
  }
 


  else
  {
  	?>

  	<script type="text/javascript">

  swal({
                  title: "Failed !",
                  text: "Logged in failed !",
                  type: "error",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                },
              function(){
                  setTimeout(function(){
                    
window.location.href="admin_login.php";
                    }, 1000);
              
                });


</script>
  	<?php

  }

}





?>

</body>
</html>