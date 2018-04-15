  <!-- Left side column. contains the logo and sidebar -->


  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
  


      <!-- Sidebar Menu -->

    <ul class="sidebar-menu" data-widget="tree">
   



  <a style="font-size:20px;color:#b8c7ce;" href="admin.php">  <div class="user-panel">
        <div class="pull-left image">
          <div style="background-color:white; background-size: 30px 30px;
    background-repeat: no-repeat;height:30px;width:30px;"  class="img-circle" alt="User Image">
 

          <center ><b><p style="font-size:20px;color:#3c8dbc;"><?php echo strtoupper(substr($_SESSION['fn'],0,1)); ?></p></b></center>
          </div>
        </div>
        <div class="pull-left info" style="left:30px;">
    
          <p style="font-size:20px;"><?php echo substr($_SESSION['fn'],1); ?></p>
          <!-- Status -->
         
        </div>
      </div>
      </a>
     
</ul>

      <ul class="sidebar-menu" data-widget="tree">


 
        <li class="header">DASHBOARD</li>
        <!-- Optionally, you can add icons to the links -->
        
    <?php
  include('label_name.php'); 

   $x=count($sidebar_label);
function listnav($a,$b,$c)
{
            if(isset($a))
              {
                if(($a) ==$b)
                {
                  echo "<li class='active'>";
                }
                else
                {
                      echo"<li>";
                }
              }
              else
              {
              echo"<li>";
              }
              $y="?x=".$b;
             echo'<a href="'. $y .'"><i class="'.$c.'"></i> <span> '. $b .' </span></a></li>'; 
}
function treelistnav($a,$b,$c,$d,$e,$f)
{


          if (strpos($a, 'STOCK') !== false)
                      {
                     echo '<li class="active treeview menu-open">';
                      }
                      else
                      {
                      echo '<li class="treeview menu-close">';
                      }


                      echo '<a href="?x='.$b.'">
                        <i class="'.$c.'"></i> <span>'.$b.'</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        ';

                      $x1=count($d);
                                    for ($j=0; $j < $x1 ; $j++ ) 
                                    {      

                                            
                                              listnav($a,$e[$j],$f);
                                           

                                  }
              echo " 
               </ul>
            </li>";


}    
function punolistnav($a,$b,$c,$d,$e,$f)
{


          if (strpos($a, 'INVOICE') !== false)
                      {
                     echo '<li class="active treeview menu-open">';
                      }
                      else
                      {
                      echo '<li class="treeview menu-close">';
                      }


                      echo '<a href="?x='.$b.'">
                        <i class="'.$c.'"></i> <span>'.$b.'</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu">
                        ';

                      $x1=count($d);
                                    for ($j=0; $j < $x1 ; $j++ ) 
                                    {      

                                            
                                              listnav($a,$e[$j],$f);
                                           

                                  }
              echo " 
               </ul>
            </li>";


}     


    

   for ($i=0; $i < $x ; $i++ ) 
   { 
        
         if($i==2 &&  $_SESSION["access"]==1    )
        { 

                      $a=$_GET['x'];
                      $b=$sidebar_label[$i];
                      $c=$sidebar_icon[$i];
                      $d=$sub_sidebar_label;
                      $e=$sub_sidebar_label;
                      $f="fa fa-circle-o";     
                      treelistnav($a,$b,$c,$d,$e,$f);          
        }
        elseif($i==1 &&  $_SESSION["access"]==2   )
        { 

                      $a=$_GET['x'];
                      $b=$sidebar_label[$i];
                      $c=$sidebar_icon[$i];
                      $d=$sub_sidebar_label;
                      $e=$sub_sidebar_label;
                      $f="fa fa-circle-o";     
                      treelistnav($a,$b,$c,$d,$e,$f);          
        }

       elseif($i==4 &&  $_SESSION["access"]==1    )
        { 

                      $a=$_GET['x'];
                      $b=$sidebar_label[$i];
                      $c=$sidebar_icon[$i];
                      $d=$sub_sidebar_label1;
                      $e=$sub_sidebar_label1;
                      $f="fa fa-circle-o";     
                      punolistnav($a,$b,$c,$d,$e,$f);          
        }
         elseif($i==3 &&  $_SESSION["access"]==2    )
        { 

                      $a=$_GET['x'];
                      $b=$sidebar_label[$i];
                      $c=$sidebar_icon[$i];
                      $d=$sub_sidebar_label1;
                      $e=$sub_sidebar_label1;
                      $f="fa fa-circle-o";     
                      punolistnav($a,$b,$c,$d,$e,$f);          
        }
        elseif($i!=6 && $i!=7 &&  $_SESSION["access"]==2)
        {     
              $a=$_GET['x'];
              $b=$sidebar_label[$i];
              $c=$sidebar_icon[$i];
              listnav($a,$b,$c);
        }

        elseif($i!=7 && $i!=8 &&  $_SESSION["access"]==1)
        { 
              $a=$_GET['x'];
              $b=$sidebar_label[$i];
              $c=$sidebar_icon[$i];
              listnav($a,$b,$c);
        }

        




          else
          {
            $y="?x=".$sidebar_label[$i];
           echo'  <li><a href="'. $y .'" style="display:none;"><i class="'.$sidebar_icon[$i].'"></i> <span> '. $sidebar_label[$i] .' </span></a></li>';
          }
   }
   ?>
     
      </ul>

 
      


        <!-- Optionally, you can add icons to the links -->
        
       
  
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>