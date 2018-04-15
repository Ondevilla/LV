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




?>
    <?php
    if (isset($_GET['x']) && (strpos($_GET['x'], 'STOCK') !== false) )
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
    elseif (isset($_GET['x']) && (strpos($_GET['x'], 'INVOICE') !== false) )
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
  

 
