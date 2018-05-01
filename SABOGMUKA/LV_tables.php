<?php
function tbl_supplier()
{
  ?>
<!--   <table id="ManageSupplier" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageSupplier" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Suppliers Name</th>
                  <th>Contact Person</th>
                  <th>Telephone</th>
                  <th>Action</th>
            
              </tr>
          </thead>
          <tbody>
            <?php  


        $xQx=getSupplier();

          while($row=mysqli_fetch_array($xQx))
            {
              $SeeModal_supplier="SeeModal".$row[0];
              $EditModal_supplier="EditModal".$row[0];
              $DeleteModal_supplier="DeleteModal".$row[0];
              echo" 
              <tr>
              <td>$row[1]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>
              <td>
              <div class='row'>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal_supplier.'"><i class="fa fa-eye"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal_supplier.'"><i class="fa fa-edit"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal_supplier.'"><i class="fa fa-remove"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              </div>
              </td>
              </tr>";
  echo "   
  <div id='".$SeeModal_supplier."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
              $tag=array('','Supplier Name','Contact Person','Telephone No.','Fax No.','Email','Type Of Supplier');

              for ($i=1; $i <=6 ; $i++) { 
                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[$i]."'>
                  </div>
              ";
              }
            

              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";

  echo "   
  <div id='".$EditModal_supplier."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";
  $_SESSION['editsupid']=$row[0];
 
  frm_edit_supplier();

  echo "
        
        </div>
      </div>
    </div>
  </div>";


  echo "   
  <div id='".$DeleteModal_supplier."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='SupId' name='supId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delSupplier'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
            }
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 
?>


<?php
function tbl_pullout_stocks()
{
  ?>
<!--   <table id="ManageSupplier" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageStocks" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Item Group</th>
                  <th>Supplier</th>
                  <th>Serial Name</th>
        
                  <th>Unit Price</th>
                  <th>Remarks</th>
              </tr>
          </thead>
          <tbody>
            <?php  


       // /* $xQx=getStocks();*/
       // $xQx=getstocktable(); //3
        


getpulloutstocktable();






        
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 
?>


<?php
function tbl_sold_stocks()
{
  ?>
<!--   <table id="ManageSupplier" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageStocks" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Item Group</th>
                  <th>Client</th>
                  <th>Invoice ID</th>
                  <th>Serial Name</th>
                  <th>Unit Price</th>
                  <th>Sell Price</th>
              </tr>
          </thead>
          <tbody>
            <?php  


       // /* $xQx=getStocks();*/
       // $xQx=getstocktable(); //3
        


getsoldstocktable();






        
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 
?>


<?php
function tbl_stocks()
{
  ?>
<!--   <table id="ManageSupplier" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageStocks" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Item Group</th>
                  <th>Quantity</th>
                  <th>Critical</th>
                  <th>Unit Price</th>
              </tr>
          </thead>
          <tbody>
            <?php  


       // /* $xQx=getStocks();*/
       // $xQx=getstocktable(); //3
        


getonstocktable();






        
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 
?>

<?php
function tbl_stocks_v2()
{
  ?>
 <table id="ManageStocksv2" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Serial Number</th>
                  <th>Item Group</th>
                  <th>Supplier</th>
                  <th>Unit Price</th>
                  <th>Actions</th>

              </tr>
          </thead>
          <tbody>
            <?php  
        $xQx=getstocktableindividual(); //10
          while($row=mysqli_fetch_array($xQx))
            {
             $SeeModal="SeeModal".$row[0];
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              echo" 
              <tr>
              <td>$row[1]</td>
              <td>$row[3]</td>
              <td>$row[5]</td>
              <td>$row[4]</td>
        
";

echo"
                          <td>
              <div class='row'>
     
              ";
              ?>
            <?php
                          echo "
        
              <div class='col-md-4'>
              ";
            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center> </div>
            ';
            ?>
            <?php
              echo "
        
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal.'"><i class="fa fa-edit"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              </div>
              </td>   
              </tr>";
  echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
  
           $_SESSION['viewassetid']=$row[0];
              viewformstockdetails();
              
            
              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";
  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";
  $_SESSION['editassetid']=$row[0];
 
  frm_edit_stocks();
  echo "
        
        </div>
      </div>
    </div>
  </div>";
  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='hidden' class='form-control' id='stockId' name='stockId'   value='".$row[0]."'>
         <center>   <label >Are you sure you want to PULL OUT '".$row[3]."' ?</label></center>  

          </div>


            <div class='row'>
    <div class='col-md-12'>
    <center>
              <button type='button' class='btn btn-block btn-primary btn-flat' style='width:98%; '>PULL OUT REASON</button>
              <textarea  style='width:98%; resize: none;' rows='5' class='form-control'  name='reason'  required ></textarea>
    </center>
    </div>
  </div>

        </div>


        <div class='modal-footer'>
                          <button type='submit' name='delStock'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
            }
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 
?>





<?php
function tbl_groups()
{
  ?>
<!--   <table id="ManageSupplier" class="display" cellspacing="0" width="100%"> -->
  <table id="Managegroups" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>GroupName</th>
                  <th>Sell Price</th>
                  <th>Critical</th>
                  <th>Actions</th>

              </tr>
          </thead>
          <tbody>
            <?php  


        $xQx=getGroup();

          while($row=mysqli_fetch_array($xQx))
            {
              $SeeModal="SeeModal".$row[0];
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              echo" 
              <tr>
              <td>$row[1]</td>
          
             
                      <td>$row[5]</td>
                           <td>$row[6]</td>
<td>
                          
              <div class='row'>
         <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center></div>
            ';
            ?>
            <?php
              echo "
        
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal.'"><i class="fa fa-edit"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              </div>
              </td>
              </tr>";
  echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
              $tag=array('','Group Name','Model Name',' Brand Name','Specification','Selling Price','Critical Stock');

              for ($i=1; $i <=6 ; $i++) { 


                if ($i==4)
                {
                    


                    echo "
                     <div class='row'>
                      <div class='col-md-12'>
                      <center>
                                <button type='button' class='btn btn-block btn-primary btn-flat' style='width:98%; '>".$tag[$i]."</button>
                                <textarea  style='width:98%; resize: none;' rows='5' class='form-control' disabled >".$row[$i]."</textarea>
                      </center>
                      </div>
                    </div>

                    ";
                }
                else
                {

                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[$i]."'>
                  </div>
                  ";
                }
              }
            

              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";

  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>

        <form action='LV_submit.php' method='POST'>
  ";

           $tag=array('','Group Name','Model Name',' Brand Name','Specification','Sell Price','Critical Stock');
           $name=array('egroupid','egroupa','egroupb',' egroupc','egroupd','egroupf','egroupe');

              for ($i=0; $i <=6 ; $i++) { 


                if($i==0)
                {
                  echo "
                  <div class='input-group margin' style='display:none;'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'  name='".$name[$i]."'  style='' value='".$row[$i]."'>
                  </div>
                  ";
                }
                elseif ($i==4)
                {
                    


                    echo "
                     <div class='row'>
                      <div class='col-md-12'>
                      <center>
                                <button type='button' class='btn btn-block btn-primary btn-flat' style='width:98%; '>".$tag[$i]."</button>
                                <textarea  style='width:98%; resize: none;' rows='5' name='".$name[$i]."' class='form-control'  >".$row[$i]."</textarea>
                      </center>
                      </div>
                    </div>

                    ";
                }
                else
                {

                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control' name='".$name[$i]."'   style='' value='".$row[$i]."'>
                  </div>
                  ";
                }
              }
            

  echo "
        
        <br>

         <button type='submit' class='btn  btn-success btn-flat'  style='float:right;' name='editGroups'>Save</button>
            <br>
               <br>
  </form>
        </div>
      </div>
    </div>
  </div>";



  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='SupId' name='supId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delSupplier'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
            }
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 





?>



<?php
function tbl_reports()
{
  ?>
<div class='box box-primary' style="padding:10px;">

  <h4> &nbsp;&nbsp;Search Reports</h4>

  <form method="POST" action="admin.php?x=REPORTS">
     <div class="row">

 <div class="col-md-12">

 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Client</button>
                  </div>
            

              <select name="Client"  class="form-control" >
               
                 <?php 
                      
                         
                           echo "<option value='' Selected>Select a Client</option>";

                    
                          $xQx=getClient();

                          while($rowx=mysqli_fetch_array($xQx))

                          {
                            echo "
                            <option value='".$rowx[1]."' >".$rowx[1]."</option>
                            ";
                          }
                    ?>
                 
              
              </select>
  </div>
  </div>
</div>

 <div class="row">

 <div class="col-md-4">

 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date Start</button>
                  </div>
                  <input type='date' class='form-control'  name="SDT">
  </div>
  </div>

  <div class="col-md-4">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date End</button>
                  </div>
                  <input type='date' class='form-control'  name="EDT">
  </div>

 </div>
  <div class="col-md-2">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
              <button type='submit' class='btn btn-block btn-success btn-flat ' id='searchbtn' onclick="searchbtn()" name="SEAR">Search</button>
                  </div>
              
  </div>

</div>

            </form>    

  <form method="POST" action="export.php">
 <div class="col-md-2">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
                <?php 
                  if(isset($_POST['SEAR']))
                  {
                  ?>
                    <button  type='submit' class='btn btn-block btn-success btn-flat '  id='exportbtn'   name="export">Export &nbsp;<i class="fa fa-file-excel-o"></i></button>
                    <?php
                  }
                  else
                  {
                    ?>
                    <button  type='submit' class='btn btn-block btn-success btn-flat '  id='exportbtn' disabled  name="export">Export &nbsp;<i class="fa fa-file-excel-o"></i></button>
                    <?php
                  }
                ?>
                     
                 
              
                  </div>
              
  </div>

</div>
 </form>


</div>
</div>


<script type="text/javascript">
  
function searchbtn()
{
  document.getElementById("exportbtn").disabled = false;
}

function exportbtn()
{
  document.getElementById("exportbtn").disabled = true;
}

</script>


 


  
                  
 
  <br>
<center>
<div class="box box-primary" style="padding: 20px;">

  <table id="ManageReport" class="ui celled table"  cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Report ID</th>
                  <th>Client Name</th>
                  <th>Total Amount</th>
                  <th>Amount Paid</th>
                  <th>Handled By</th>
                  <th>Date Paid</th>
                  <th>Actions</th>

              </tr>
          </thead>
          <tbody>
            <?php  


global $conn;
$total='';
if((!empty($_POST['SDT'])) && (!empty($_POST['EDT'])) &&  (!empty($_POST['Client'])) )
{
  $_SESSION['exportsql']=$xQx_select = "SELECT  FROM  reportsclientorder WHERE date_paid between '".$_POST['SDT']."' AND '".$_POST['EDT']."'  AND isDeleted='0' AND clientName='".$_POST['Client']."' ";
}
elseif((empty($_POST['SDT'])) && (empty($_POST['EDT'])) &&  (!empty($_POST['Client'])))
{
    $_SESSION['exportsql']=$xQx_select = "SELECT * FROM  reportsclientorder WHERE   isDeleted='0' AND clientName='".$_POST['Client']."' ";
}
elseif((!empty($_POST['SDT'])) && (!empty($_POST['EDT'])) &&  (empty($_POST['Client'])))
{
    $_SESSION['exportsql']=$xQx_select = "SELECT * FROM  reportsclientorder WHERE  date_paid between '".$_POST['SDT']."' AND '".$_POST['EDT']."'  AND isDeleted='0' ";
}
else
{
    $_SESSION['exportsql']=$xQx_select = "SELECT * FROM  reportsclientorder WHERE isDeleted='0'";
}
 


  $query_select=mysqli_query($conn,$xQx_select);         

if(mysqli_num_rows($query_select)>0)
{


       while($row=mysqli_fetch_array($query_select))

{


/*              $SeeModal="SeeModal".$row[0];*/
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              $PrintModal = "PrintModal".$row[0];     
              echo" 
              <tr>
              <td>$row[0]</td>
              <td>$row[4]</td>
          
              <td>$row[7]</td> 


              <td>$row[8]</td>
              <td>$row[9]</td>
              <td>$row[10]</td>
<td>
                          
              <div class='row'>
     
              ";
              ?>
            <?php
/*            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center>
            ';*/
            ?>
            <?php
              echo "
        
              <div class='col-md-12'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-primary btn-flat" data-toggle="modal" data-target="#'.$PrintModal.'"><i class="fa fa-print"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
      
              </div>
              </td>
              </tr>";
/*  echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
              $tag=array('','Supplier Name','Contact Person','Telephone No.','Fax No.','Email','Type Of Supplier');

              for ($i=1; $i <=6 ; $i++) { 
                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[$i]."'>
                  </div>
              ";
              }
            

              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";
*/
  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";



  echo "
        
        </div>
      </div>
    </div>
  </div>";



  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='SupId' name='supId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[0]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delReport'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>"; 
  echo "   
  <div id='".$PrintModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='print_report.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='SupId' name='invoiceId'  style='opacity:0;' value='".$row[1]."'>
            <label ><center>Would you like to print Report # '".$row[0]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delSupplier'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";  
/*$total[].=$row[7];*/

            }
            ?>
            
          
            </tbody>
          </table>

</div></center>

  <?php 


       while($row123=mysqli_fetch_array($query_select))

{

$total[].=$row123[7];
}

/*   echo "<hr><div style='float:right;cursor:default;margin-right:30px;' class='btn btn-primary btn-flat' disabled> GRAND TOTAL ". array_sum($total)."</div><br><br><br><br><br>";*/

}
} 

?>

<?php
function tbl_receivables()
{
   ?>

  <form method="POST" action="admin.php?x=RECEIVABLES">
 <div class='box box-primary' style="padding:10px;">

  <h4> &nbsp;&nbsp;Search Receivables</h4>

     <div class="row">

 <div class="col-md-12">

 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Client</button>
                  </div>
            

              <select name="Client"  class="form-control" >
               
                 <?php 
                      
                         
                           echo "<option value='' Selected>Select a Client</option>";

                    
                          $xQx=getClient();

                          while($rowx=mysqli_fetch_array($xQx))

                          {
                            echo "
                            <option value='".$rowx[1]."' >".$rowx[1]."</option>
                            ";
                          }
                    ?>
                 
              
              </select>
  </div>
  </div>
</div>

 <div class="row">

 <div class="col-md-4">

 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date Start</button>
                  </div>
                  <input type='date' class='form-control'  name="SDT">
  </div>
  </div>

  <div class="col-md-4">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date End</button>
                  </div>
                  <input type='date' class='form-control'  name="EDT">
  </div>

 </div>
  <div class="col-md-2">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
              <button type='submit' class='btn btn-block btn-success btn-flat ' id='searchbtn' onclick="searchbtn()" name="SEAR">Search</button>
                  </div>
              
  </div>

</div>

            </form>    

  <form method="POST" action="exportrec.php">
 <div class="col-md-2">
 <div class='input-group margin'>
                  <div class='input-group-btn'>
                <?php 
                  if(isset($_POST['SEAR']))
                  {
                  ?>
                    <button  type='submit' class='btn btn-block btn-success btn-flat '  id='exportbtn'   name="export">Export &nbsp;<i class="fa fa-file-excel-o"></i></button>
                    <?php
                  }
                  else
                  {
                    ?>
                    <button  type='submit' class='btn btn-block btn-success btn-flat '  id='exportbtn' disabled  name="export">Export &nbsp;<i class="fa fa-file-excel-o"></i></button>
                    <?php
                  }
                ?>
                     
                 
              
                  </div>
              
  </div>

</div>
 </form>


</div>
</div>


<script type="text/javascript">
  
function searchbtn()
{
  document.getElementById("exportbtn").disabled = false;
}

function exportbtn()
{
  document.getElementById("exportbtn").disabled = true;
}

</script>

  <br>
<center>
<div class="box box-primary" style="padding: 20px;">
  <table id="RECEIVABLES" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Invoice ID</th>
                  <th>Client Name</th>
                    <th>Date</th>
                     <th>Due Date</th>
                          <th>Handled By</th>
                  <th>Sell Price</th>
             
             


              </tr>
          </thead>
          <tbody>
            <?php  


global $conn;
$total='';



if((!empty($_POST['SDT'])) && (!empty($_POST['EDT'])) &&  (!empty($_POST['Client'])) )
{
  $_SESSION['exportsql']=$xQx_select = "SELECT i.`invoiceId`,i.`clientName`,i.`date_created`,i.`due_date`,a.`handledBy`,SUM(a.`sellPrice`) FROM  invoices i INNER JOIN items_ordered a ON a.`invoiceId`=i.`invoiceId` WHERE   NOT i.`Status`='2' AND  i.`isDeleted`='0' AND a.`isDeleted`='0' AND i.`date_created` between '".$_POST['SDT']."' AND '".$_POST['EDT']."'  AND clientName='".$_POST['Client']."' GROUP BY i.`invoiceId` ";
}
elseif((empty($_POST['SDT'])) && (empty($_POST['EDT'])) &&  (!empty($_POST['Client'])))
{
    $_SESSION['exportsql']=$xQx_select = "SELECT i.`invoiceId`,i.`clientName`,i.`date_created`,i.`due_date`,a.`handledBy`,SUM(a.`sellPrice`) FROM  invoices i INNER JOIN items_ordered a ON a.`invoiceId`=i.`invoiceId` WHERE   NOT i.`Status`='2' AND  i.`isDeleted`='0' AND a.`isDeleted`='0'   AND clientName='".$_POST['Client']."' GROUP BY i.`invoiceId` ";
}
elseif((!empty($_POST['SDT'])) && (!empty($_POST['EDT'])) &&  (empty($_POST['Client'])))
{
    $_SESSION['exportsql']=$xQx_select = "SELECT i.`invoiceId`,i.`clientName`,i.`date_created`,i.`due_date`,a.`handledBy`,SUM(a.`sellPrice`) FROM  invoices i INNER JOIN items_ordered a ON a.`invoiceId`=i.`invoiceId` WHERE   NOT i.`Status`='2' AND  i.`isDeleted`='0' AND a.`isDeleted`='0'  AND i.`date_created`  between '".$_POST['SDT']."' AND '".$_POST['EDT']."'  GROUP BY i.`invoiceId`  ";
}
else
{
    $_SESSION['exportsql']= $xQx_select = "SELECT i.`invoiceId`,i.`clientName`,i.`date_created`,i.`due_date`,a.`handledBy`,SUM(a.`sellPrice`) FROM  invoices i INNER JOIN items_ordered a ON a.`invoiceId`=i.`invoiceId` WHERE   NOT i.`Status`='2' AND  i.`isDeleted`='0' AND a.`isDeleted`='0' GROUP BY i.`invoiceId`  " ;
}





 
        $query_select=mysqli_query($conn,$xQx_select);         
      if((mysqli_num_rows($query_select))>0)
      {
             while($row=mysqli_fetch_array($query_select))

                  {


      /*              $SeeModal="SeeModal".$row[0];*/
                    $EditModal="EditModal".$row[0];
                    $DeleteModal="DeleteModal".$row[0];
                    $PrintModal = "PrintModal".$row[0];     
                    echo" 
                    <tr>
                    <td>$row[0]</td>
                    <td>$row[1]</td>
                
                    <td>$row[2]</td>              
                    <td>".$row[3]."</td>
                    <td>$row[4]</td>
                     <td>".number_format($row[5])."</td>

                    </tr>";

                  $total[].=$row[5];

                  }
                  ?>
                  
                
                  </tbody>
                </table>

      </div></center>

        <?php 


      

         echo "<hr><div style='float:right;cursor:default;margin-right:30px;' class='btn btn-primary btn-flat' disabled> GRAND TOTAL ".array_sum($total)."</div><br><br><br><br><br>";

      }
} 

?>

<?php
function tbl_invoice()
{

 
  ?>
<table id="ManageClients" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Invoice No.</th>
                  <th>Client</th>
                  <th>Date</th>
                  <th>Due Date</th>            
                   <th>Actions </th>     
              </tr>
          </thead>
          <tbody>
            <?php  

global $conn;
  $xQx = "SELECT invoiceId,clientName,date_created,due_date FROM invoices WHERE Status ='0'  AND isDeleted = '0' ";
  $query_invoice=mysqli_query($conn,$xQx);

          while($row=mysqli_fetch_array($query_invoice))
            {
/*              $SeeModal="SeeModal".$row[0];*/
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              $AddItemModal="AddItemModal".$row[0];
              $ViewItemModal="ViewItemModal".$row[0];
              $PayoutModal=$row[0];



              $get_assets = $row[0];
              echo" 
              <tr>
              <td>$row[0]</td>
              <td>$row[1]</td>
       
              <td>$row[2]</td>
              <td>$row[3]</td>

              <td>
           

             
              ";
         
            echo '
               <div class="row">
             <div class="col-md-4">
            <button type="button" class="btn btn-block btn-primary btn-flat" data-toggle="modal" data-target="#'.$ViewItemModal.'"><i class="fa fa-eye"></i></button>
             </div>



<div class="col-md-4">
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal.'"><i class="fa fa-edit"></i></button>
             </div>

<div class="col-md-4">
          <form action="admin.php?x=SAMPLE" method="post">
            <button type="submit" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i></button></center> </div>
            <input type="hidden" name="id"  value="'.$get_assets.'" >
            </form>
                </div>
                      </div>
            '


            ;


        

            
              echo '
             
        


              <div class="row">
          <div class="col-md-6">
          <form action="throw.php" method="post">

                    <input type="hidden" name="generate_invoice"  value="'.$PayoutModal.'" >
            <button type="submit" class="btn btn-block btn-yellow btn-flat"><i class="fa fa-print"></i></button>






            </form>

</div>


<div class="col-md-6">
    <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button>

</div>  
              </div>

              </td>
              </tr>';


  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
               <div class='row'>
<div class='col-md-4'>
Item Name
</div>         


<div class='col-md-2'>
Unit Price
</div>  


<div class='col-md-2'>
Sell Price
</div>  




<div class='col-md-2'>
Date
</div>  

<div class='col-md-2'>
Action
</div>  

  </div>





";
  

 $invoice_id  = $row[0];
?>

<?php 

  $xQx2 = "SELECT * FROM items_ordered WHERE isDeleted = '0' AND invoiceId = $invoice_id";
  $query2=mysqli_query($conn,$xQx2);


            while($row2 = mysqli_fetch_array($query2))

                { 




?>
                <div class='row'>
<div class='col-md-4'>
<br>
<?php 
echo $row2[2];

?>

</div>         


<div class='col-md-2'>

<br>
<?php 

echo $row2[4];

?>



</div>  


<div class='col-md-2'>
  <br>
<?php 
echo $row2[5];

?>



</div>  



 

<div class='col-md-2'>
  <br>
<?php 

echo $row2[8];

?>

</div>  

<div class='col-md-2'>
<?php 

echo "<form  role='form' action='LV_submit.php' method='post' enctype='multipart/form-data'>
    <button type='submit' name='edititemtoavailable'  class='btn btn-danger btn-sm' ><i class='fa fa-times'></i></button>
            <input type='hidden' class='form-control'  name='InvoiceId'    value='".$invoice_id."'>
              <input type='hidden' class='form-control'  name='snpa'    value='".$row2[2]."'>
       
       
        
                         
                      
        </form>"
?>

</div>  


  </div>
       <?php 
   
}




  echo "
        
        </div>
      </div>
    </div>
  </div>";


  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='clientId' name='InvoiceId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delInvoice'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
  echo "   
  <div id='".$ViewItemModal."' class='modal fade'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
<div class='col-md-6'>
Item Name
</div>         


<div class='col-md-2'>
Unit Price
</div>  


<div class='col-md-2'>
Sell Price
</div>  




<div class='col-md-2'>
Date
</div>  

  </div>





";

?>

<?php 

  $xQx = "SELECT * FROM items_ordered WHERE isDeleted = '0' AND invoiceId = '$invoice_id'";
  $query=mysqli_query($conn,$xQx);


            while($row = mysqli_fetch_array($query))

                { 




?>
                <div class='row'>
<div class='col-md-6'>

<?php 
echo $row[2];

?>

</div>         


<div class='col-md-2'>


<?php 
echo $row[4];

?>



</div>  


<div class='col-md-2'>
<?php 
echo $row[5];

?>



</div>  



 

<div class='col-md-2'>
<?php 
echo $row[8];

?>

</div>  

  </div>
       <?php 
   

}
             echo "      
          










        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";
  


            

}

            ?>
            
          
            </tbody>
          </table>

  <?php 
} 




function tbl_invoice_generated()
{

  include("connect.config.php");
  ?>
<!--   <table id="ManageClients" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageClients" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Invoice No.</th>
                  <th>Client</th>
            
                  <th>Date</th>
                  <th>Due Date</th>    
                  <th>D.R.</th>                          
                   <th>Actions </th>     
              </tr>
          </thead>
          <tbody>
            <?php  

  $xQx = "SELECT * FROM invoices WHERE Status ='1'  AND isDeleted = '0' ";
  $query_invoice=mysqli_query($conn,$xQx);

          while($row=mysqli_fetch_array($query_invoice))
            {
/*              $SeeModal="SeeModal".$row[0];*/
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              $AddItemModal="AddItemModal".$row[0];
              $ViewItemModal="ViewItemModal".$row[0];
              $ORModal="ORModal".$row[0];


              $PayoutModal=$row[0];



              $get_assets = $row[0];
              echo" 
              <tr>
              <td>$row[0]</td>
              <td>$row[3]</td>
    
              <td>$row[11]</td>
              <td>$row[12]</td>
              <td>$row[27]</td>
              <td>
              <div class='row'>






              <div class='col-md-3'>
              ";
              ?>
            <?php
/*            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center>
            ';*/
            ?>
            <?php
/*              echo "
              </div>
              <div class='col-md-4'>
              ";*/
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-primary btn-flat " data-toggle="modal" data-target="#'.$ViewItemModal.'"><i class="fa fa-eye"></i></button></center> </div>

  <div class="col-md-3">
          <form action="print_or.php" method="post">
<button type="submit" class="btn btn-block btn-info btn-flat " data-toggle="modal" data-target="#'.$ORModal.'" style="font-size:11px;">O.R. &nbsp; <i class="fa fa-print"></i></button>
  
            <input type="hidden" name="print_or"  value="'.$PayoutModal.'" >
            </form>
  </div>



            <div class="col-md-3">
          <form action="admin.php?x=PAYOUT" method="post">
            <button type="submit" class="btn btn-block btn-yellow btn-flat"><i class="fa fa-money"></i></button></center> 
            <input type="hidden" name="invoice_paid"  value="'.$PayoutModal.'" >
            </form>


</div>

<div class="col-md-3">
    <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>

</div>  


            '










            ;

/*          <form action="admin.php?x=SAMPLE" method="post">
            <button type="submit" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i></button></center> </div>
            <input type="hidden" name="id"  value="'.$get_assets.'" >
            </form>*/
            ?>











            <?php
              echo "
     
        ";
              ?>
            <?php
            echo '
        
            ';
            ?>
            <?php
              echo '
             
              </div>


              <div class="row">



              </div>
              </td>
              </tr>';

/*  echo "   
  <div id='".$ViewItemModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>

";

?>
<script>$(document).ready(function(){
    $('#table_items_orders').DataTable({} );
});</script>
<table id="table_items_orders">
  

<thead>
              <tr>
                
                     
              </tr>
          </thead>
<tbody>
<tr>
<td>BAKIT</td>
<td>andito TO</td>
</tr>
</tbody>

</table>

<?php

echo "
        </div>
      </div>
    </div>
  </div>";
*/

  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";

 




  echo "
        
        </div>
      </div>
    </div>
  </div>";


  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='clientId' name='InvoiceId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delgenInvoice'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
  echo "   
  <div id='".$ViewItemModal."' class='modal fade'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
<div class='col-md-6'>
Item Name


</div>         


<div class='col-md-2'>
Unit Price


</div>  


<div class='col-md-2'>
Sell Price


</div>  



  

<div class='col-md-2'>
Date

</div>  

  </div>
<br><br>




";
$invoice_id  = $row[0];
?>

<?php 

  $xQx = "SELECT * FROM items_ordered WHERE isDeleted = '0' AND invoiceId = $invoice_id";
  $query=mysqli_query($conn,$xQx);


            while($row = mysqli_fetch_array($query))

                { 




?>
                <div class='row'>
<div class='col-md-6'>

<?php 
echo $row[2];

?>

</div>         



<div class='col-md-2'>


<?php 
echo $row[4];

?>



</div>  


<div class='col-md-2'>
<?php 
echo $row[5];

?>



</div>  





<div class='col-md-2'>
<?php 
echo $row[8];

?>

</div>  

  </div>
       <?php 
   
}

             echo "      
          










        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";
  


            }




            ?>
            
          
            </tbody>
          </table>
  <?php 
} 




function tbl_invoice_paid()
{

  include("connect.config.php");
  ?>
<!--   <table id="ManageClients" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageClients" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Invoice No.</th>
                  <th>Client</th>
                  <th>Business Type</th>
                  <th>Date</th>
                  <th>Due Date</th>            
                   <th>Actions </th>     
              </tr>
          </thead>
          <tbody>
            <?php  

  $xQx = "SELECT * FROM invoices WHERE Status ='2'  AND isDeleted = '0' ";
  $query_invoice=mysqli_query($conn,$xQx);

          while($row=mysqli_fetch_array($query_invoice))
            {
/*              $SeeModal="SeeModal".$row[0];*/
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              $AddItemModal="AddItemModal".$row[0];
              $ViewItemModal="ViewItemModal".$row[0];
              $PayoutModal=$row[0];



              $get_assets = $row[0];
              echo" 
              <tr>
              <td>$row[0]</td>
              <td>$row[3]</td>
              <td>$row[6]</td>
              <td>$row[11]</td>
              <td>$row[12]</td>

              <td>
              <div class='row'>






              <div class='col-md-12'>
              ";
              ?>
            <?php
/*            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center>
            ';*/
            ?>
            <?php
/*              echo "
              </div>
              <div class='col-md-4'>
              ";*/
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-primary btn-flat" data-toggle="modal" data-target="#'.$ViewItemModal.'"><i class="fa fa-eye"></i></button></center> </div>';


//             <div class="col-md-4">
//           <form action="admin.php?x=PAYOUT" method="post">
//              <input type="hidden" name="invoice_paid"  value="'.$PayoutModal.'" >
//             <button type="submit" class="btn btn-block btn-yellow btn-flat"><i class="fa fa-money"></i></button></center> 
         
//             </form>

// </div>

// <div class="col-md-4">
//     <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>

// </div>  



/*          <form action="admin.php?x=SAMPLE" method="post">
            <button type="submit" class="btn btn-block btn-success btn-flat"><i class="fa fa-plus"></i></button></center> </div>
            <input type="hidden" name="id"  value="'.$get_assets.'" >
            </form>*/
            ?>











            <?php
              echo "
     
        ";
              ?>
            <?php
            echo '
        
            ';
            ?>
            <?php
              echo '
             
              </div>


              <div class="row">



              </div>
              </td>
              </tr>';

  echo "   
  <div id='".$ViewItemModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>

";

$_SESSION['viewinvo']=$row[0];

frm_view_itemsinvo();

echo "
        </div>
      </div>
    </div>
  </div>";

  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";

 




  echo "
        
        </div>
      </div>
    </div>
  </div>";


  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='clientId' name='InvoiceId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delInvoice'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
  echo "   
  <div id='".$ViewItemModal."' class='modal fade'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
<div class='col-md-2'>
Item Name


</div>         

<div class='col-md-2'>
Quantity


</div>  

<div class='col-md-2'>
Unit Price


</div>  


<div class='col-md-2'>
Sell Price


</div>  



<div class='col-md-2'>
Handled By

</div>  

<div class='col-md-2'>
Date

</div>  

  </div>
<br><br>




";
$invoice_id  = $row[0];
?>

<?php 

  $xQx = "SELECT * FROM items_ordered WHERE isDeleted = '0' AND invoiceId = $invoice_id";
  $query=mysqli_query($conn,$xQx);


            while($row = mysqli_fetch_array($query))

                { 




?>
                <div class='row'>
<div class='col-md-2'>

<?php 
echo $row[2];

?>

</div>         

<div class='col-md-2'>


<?php 
echo $row[3];

?>



</div>  

<div class='col-md-2'>


<?php 
echo $row[4];

?>



</div>  


<div class='col-md-2'>
<?php 
echo $row[5];

?>



</div>  



<div class='col-md-2'>
<?php 
echo $row[7];

?>

</div>  

<div class='col-md-2'>
<?php 
echo $row[8];

?>

</div>  

  </div>
       <?php 
   
}

             echo "      
          










        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";
  


            }




            ?>
            
          
            </tbody>
          </table>
  <?php 
} 

function tbl_client()
{
  ?>
<!--   <table id="ManageClients" class="display" cellspacing="0" width="100%"> -->
  <table id="ManageClients" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>Company Name</th>
                  <th>Contact Person</th>
                  <th>Telephone No.</th>
                  <th>Action</th>
            
              </tr>
          </thead>
          <tbody>
            <?php  


 global $conn;
  $xQx = "SELECT clientId,";
  $xQx .=  "clientName,";
  $xQx .=  "contactPerson,";
  $xQx .=  "telno,";
  $xQx .=  "mobileno,";
  $xQx .=  "faxno,";
  $xQx .=  "email ";
  $xQx .=  "FROM clients ";
  $xQx .=  "WHERE isDeleted = 0 ";
  $query=mysqli_query($conn,$xQx);
$xQx= $query;
       /* $xQx=getClient();*/

          while($row=mysqli_fetch_array($xQx))
            {
              $SeeModal="SeeModal".$row[0];
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              echo" 
              <tr>
              <td>$row[1]</td>
              <td>$row[2]</td>
              <td>$row[3]</td>             
              <td>
              <div class='row'>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal.'"><i class="fa fa-edit"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              </div>
              </td>
              </tr>";
  echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
         

              $tag=array('','Client Name','Contact Person','Telephone No.','Mobile No.','Fax No.','Email');

              for ($i=1; $i <=6 ; $i++) { 
                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[$i]."'>
                  </div>
              ";
              }
            

              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";

  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";

 

$_SESSION['editclientid']=$row[0];
  frm_edit_client_a();

  echo "
        
        </div>
      </div>
    </div>
  </div>";


  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='clientId' name='clientId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to delete '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delClient'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";      
            }
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 


?>
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------------------ -->

<?php

function tbl_accounts()
{
  ?>
<!--   <table id="ManageClients" class="display" cellspacing="0" width="100%"> -->
  <table id="accounts" class="ui celled table" cellspacing="0" width="100%">
          <thead>
              <tr>
                  <th>UID</th>
                  <th>Username</th>
             
                  <th>Accessright</th>
                  <th>isActive</th>
                  <th>Action</th>

            
              </tr>
          </thead>
          <tbody>
            <?php  


        $xQx=get_user();

          while($row=mysqli_fetch_array($xQx))
            {


               if($row[3]==1)
                  {
                    $namesss='Administrator';
                  }
                  else
                  {
                     $namesss='Employee';
                  }
                


              $SeeModal="SeeModal".$row[0];
              $EditModal="EditModal".$row[0];
              $DeleteModal="DeleteModal".$row[0];
              $RestoreModal="RestoreModal".$row[0];
              echo" 
              <tr>
                <td>$row[0]</td>
              <td>$row[1]</td>


              <td>$namesss</td> 

              <td>$row[4]</td> 
                       
                       
              <td>
              <div class='row'>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-info btn-flat" data-toggle="modal" data-target="#'.$SeeModal.'"><i class="fa fa-eye"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>
              <div class='col-md-4'>
              ";
              ?>
            <?php
            echo '
            <button type="button" class="btn btn-block btn-warning btn-flat" data-toggle="modal" data-target="#'.$EditModal.'"><i class="fa fa-edit"></i></button></center>
            ';
            ?>
            <?php
              echo "
              </div>";
if($row[4]==1)
  {

    echo"
              <div class='col-md-4'>";
            echo '
            <button type="button" class="btn btn-block btn-danger btn-flat" data-toggle="modal" data-target="#'.$DeleteModal.'"><i class="fa fa-remove"></i></button></center>
            ';
              echo "
              </div>";
    }

else
{
   echo"
              <div class='col-md-4'>";
            echo '
            <button type="button" class="btn btn-block btn-success btn-flat" data-toggle="modal" data-target="#'.$RestoreModal.'"><i class="fa fa-check"></i></button></center>
            ';
              echo "
              </div>";

}
              echo"


              </div>
              </td>
              </tr>";

  echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
              <div class='row'>
              ";
         

              $tag=array('','Username','Password','Accessright');

              for ($i=1; $i <=3 ; $i++) { 



                if ($i==2)
                {
                   echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='". decryptIt($row[$i]) ."'>
                  </div>
              ";
                }
                elseif ($i==3)
                {

                  if($row[$i]==1)
                  {
                    $namesss='Administrator';
                  }
                  else
                  {
                     $namesss='Employee';
                  }


                   echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$namesss ."'>
                  </div>
              ";
                }
                else
                {
                  echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>".$tag[$i]."</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[$i]."'>
                  </div>
              ";
            }
              }
            

              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";

  echo "   
  <div id='".$EditModal."' class='modal fade'>
    <div class='modal-dialog modal-lg '>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
  ";

 

$_SESSION['account']=$row[0];

  frm_edit_account();

  echo "
        
        </div>
      </div>
    </div>
  </div>";

if($row[4]==1)
{
  echo "   
  <div id='".$DeleteModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='delId' name='delId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to disable '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='delAccount'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";   
}
else
{
    echo "   
  <div id='".$RestoreModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>
          <form  role='form' action='LV_submit.php' method='post' id='partdelpost' enctype='multipart/form-data'>
          <div class='form-group'>
            <input type='text' class='form-control' id='resId' name='resId'  style='opacity:0;' value='".$row[0]."'>
            <label ><center>Are you sure you want to restore '".$row[1]."' ?</center></label>
          </div>
        </div>
        <div class='modal-footer'>
                          <button type='submit' name='resAccount'  class='btn btn-success'>Yes</button>
                          <button type='button' class='btn btn-danger' data-dismiss='modal'>No</button>
        </form>
        </div>
      </div>
    </div>
  </div>";   
}


            }
            ?>
            
          
            </tbody>
          </table>
  <?php 
} 

?>

