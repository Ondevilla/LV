<!--
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <div class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>LV</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>LIGHTVEND</b></span>
    </div>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
                      <li class="dropdown notifications-menu ">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                  <i class="fa fa-bell-o"  style="padding:4px;"></i>

                                  <?php 

                                  $x1="";
                                  $x11[]="";
                                  $query=mysqli_query($conn,"




SELECT COUNT(a.itmTypeId) AS stock,g.critical,g.groupName
  
FROM assetstwo AS a RIGHT JOIN groups AS g ON a.itmTypeId=g.groupid GROUP BY  a.itmTypeId


                                    ");
/*
                                  SELECT COUNT(itmTypeId) AS stock, (SELECT g.critical FROM groups AS g WHERE g.groupid=a. itmTypeId) AS Critical, (SELECT g.groupName FROM groups AS g WHERE g.groupid=a. itmTypeId) AS Gname,
   CASE
      WHEN  COUNT(itmTypeId) IS NULL AND (SELECT g.critical FROM groups AS g WHERE g.groupid=a. itmTypeId) IS NULL THEN 'true'  
      WHEN COUNT(itmTypeId)<=(SELECT g.critical FROM groups AS g WHERE g.groupid=a. itmTypeId) THEN 'true' 
      ELSE 'false' 
   END AS answer
FROM assetstwo AS a GROUP BY  itmTypeId */

                                  while ($row=mysqli_fetch_array($query)) {
                                  if( $row[0]<=$row[1])
                                  {

$x1+=1;
$x11[].=$row[2];


                                  }

                                  else
                                  {

                                  }

                                  }
echo ' <span class="label label-danger">'.$x1.'</span>';

                                  ?>

                                 
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">You have <?php echo $x1;  ?> Critical Stock</li>
                                  <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                              
                                      
                                          <?php for ($i=1; $i < (count($x11)) ; $i++) { 


                                            echo "
                                      <li> 
                                        <a href='admin.php?x=GROUP'>
                                          <i class='fa fa-warning text-red'></i> 
                                          ".$x11[$i]."
                                        </a>
                                      </li>
                                            ";
                                          } ?>
                                      
                                      
                                    </ul>
                                  </li>
                                  <li class="footer"><a href="#"> &nbsp;</a> </li>
                                </ul>
                              </li>
  
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="logout.php" >
              <!-- The user image in the navbar-->
              <img src="dist/img/logout.png" class="user-image" alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">LOGOUT</span>




            </a>
           
          </li>
     
        </ul>
      </div>
    </nav>
  </header>