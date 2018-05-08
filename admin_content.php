  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     

     <style> 
   h3
{
  color:  white;
}
 </style>

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

<?php 

if(empty($_SESSION['fn']))
{
  ?>
  <script type="text/javascript">
       swal({
      title: "ERROR 404 . . .",
      text: "NOTHING SPECIAL",
    

  
        timer: 2000,
        showConfirmButton: false
      },  function(){
                  setTimeout(function(){
                    window.location.href='admin_login.php';
                      });
                });
    </script>
  <?php
}



?>
    <?php
    if (isset($_GET['x']) && ((strpos($_GET['x'], 'STOCK') == true)) )
    {

        $x1=count($sub_sidebar_label);
          for ($j=0; $j < $x1 ; $j++) 
          { 
           
          
              if(($_GET['x']) == $sub_sidebar_label[$j])
              {
              $y="LV_".$sub_sidebar_label[$j].".php";
              include($y);
              }
          }
    }
    elseif (isset($_GET['x']) && ((strpos($_GET['x'], 'INVOICE') == true)) )
    {

        $x1=count($sub_sidebar_label1);
          for ($j=0; $j < $x1 ; $j++) 
          { 
           
          
              if(($_GET['x']) == $sub_sidebar_label1[$j])
              {
              $y="LV_".$sub_sidebar_label1[$j].".php";
              include($y);
              }
          }
    }
    elseif(isset($_GET['x']) )
    {
      
      for ($i=0; $i < $x ; $i++) 
      { 
       
      
          if(($_GET['x']) == $sidebar_label[$i])
          {
          $y="LV_".$sidebar_label[$i].".php";
          include($y);
          }
      }
      

    }
    
    else
    {
      

    }
    ?>



    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

 
