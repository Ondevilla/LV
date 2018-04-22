<?php 
include('connect.config.php');
include('support/function.php');
session_start();

if(isset($_POST["Login"]))
{
$username = $_POST["user"];
$password = $_POST["pass"];




$row=mysqli_query($conn,'SELECT * From `useraccount` WHERE `user_name`="'.$username.'" AND `user_password`="'.$password.'" and isActive="1" ');
$search=mysqli_fetch_assoc($row);

  $_SESSION['fn']=$search['user_name'];
  $_SESSION["u_id"] = $search["user_id"];

  $_SESSION["access"] = $search["accessright"];

  if (!empty($search) && ($search['accessright']==1))
  {


?> 


<script>

window.location.href="admin.php?x=";

</script>

<?php
  }
   elseif (!empty($search) && ($search['accessright']==2))
  {

?> 


<script>

window.location.href="admin.php?x=";

</script>

<?php
  }


  else
  {
  	?>

  	<script>

window.location.href="admin_login.php";

</script>
  	<?php

  }

}





?>