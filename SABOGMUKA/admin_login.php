<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LightVend</title>
  

    
      <link rel="stylesheet" href="css/mystyle.css">
      <link rel="stylesheet" type="text/css" href="sm/dist/sweetalert.css">
<script src="sm/dist/sweetalert.min.js"></script>
<style type="text/css">
      .style
      {
        color:white;
        text-decoration: none;
      }
      .style:hover
      {
        color:#0780bb;
        cursor: grab;
      }
    </style>
      
</head>




  

<body>
<?php
session_start();


 ?>
  <div class="background-wrap">
  <div class="background"></div>
</div>

<form id="accesspanel" action="admin_submit.php" method="post">
  <h1 id="litheader">LightVend</h1>
  <div class="inset">
    <p>
      <input type="text" name="user"  placeholder="Username" required>
    </p>
    <p>
      <input type="password" name="pass"  placeholder="Password" required>
    </p>
<!--     <center> <a class="style" href="admin_registration.php">Sign up ?</a></center> -->
      <br>
  <p class="p-container">
    <input type="submit" name="Login" id="go" value="Login">
  </p>

</form>




  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>







    <script> 



<script type="text/javascript">

  $(document).ready(function() {
 
    $('#accesspanel').on('submit', function() {
            document.getElementById("litheader").className = "poweron";
            document.getElementById("go").className = "";
            document.getElementById("go").value = "Initializing...";
    });

});
</script>






</body>
</html>
