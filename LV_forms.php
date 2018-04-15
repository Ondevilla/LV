
<?php



function frm_add_account()
{
?>
<div class="divider"></div>

  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Username</button>
                  </div>
                  <input type="text" class="form-control"  name="user1"  required>
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Password</button>
                  </div>
                  <input type="text" class="form-control"  name="user2"  required>
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Accessright</button>
                  </div>
                
              <select name="user3"  class="form-control" required>
                 <option value="1" Selected>Administrator</option>
                 <option value="2" >Employee</option>
            
              
              </select>
      </div>
    </div>

  </div>
 



  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addAccount">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>

<?php 
}

?>

<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php
function frm_edit_account()
{
?>
<div class="divider"></div>
<?php
$xQx=geteditAccount($_SESSION['account']);
$row=mysqli_fetch_array($xQx);
?>

  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
     <input type="text" class="form-control"  name="user0"  value="<?php echo $row[0]; ?>" style="display: none;" required>
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Username</button>
                  </div>
                  <input type="text" class="form-control"  name="user1"  value="<?php echo $row[1]; ?>" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Password</button>
                  </div>
                  <input type="text" class="form-control"  name="user2"  value="<?php echo decryptIt($row[2]);?>" required>
      </div>
    </div>

    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Accessright</button>
                  </div>
                
              <select name="user3"  class="form-control" required>
                <?php 

                if ($row[3]=='1')
                {
                 echo '<option value="1"  Selected>Administrator</option>
                  <option value="2" >Employee</option>';
                }
                else
                {
                   echo '<option value="1"  >Administrator</option>
                  <option value="2" Selected>Employee</option>';
                }
                

                ?>
            
            
              
              </select>
      </div>
    </div>

  </div>
 



  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="editAccount">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>

<?php 
}
?>


<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
<?php 




function frm_add_supplier()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Suppliers Name</button>
                  </div>
                  <input type="text" class="form-control"  name="Supplier_a"  required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Contact Person</button>
                  </div>
                  <input type="text" class="form-control"  name="Supplier_b"  required>
      </div>
    </div>
    
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                
              <select name="Supplier_c"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php $xQx=getallSup_BusType();
                 
                      while($row=mysqli_fetch_array($xQx))

                      {
                        echo "
                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>
    </div>
  </div>




  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Address</button>
            </div>
            <input type="text" class="form-control"  name="Supplier_d"  required>
      </div>
    </div>
  </div>


  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Telephone No</button>
                  </div>
                  <input type="text" class="form-control"  name="Supplier_e"  required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Fax No</button>
                  </div>
                  <input type="text" class="form-control"  name="Supplier_f"  required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Email</button>
                  </div>
                  <input type="email" class="form-control"  name="Supplier_g"  required>
      </div>
    </div>
  </div>

  


  <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>
              <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="Supplier_h"  ></textarea>
    </center>
    </div>
  </div>

  <div class="row">
    <div class="col-md-9">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Suppliers Type</button>
                  </div>
              <select name="Supplier_i"  class="form-control"  required>
                <option value=" " Selected> </option>
                <option value="Potential">Potential</option>
                <option value="Accredited">Accredited</option>
         
              </select>
                  
      </div>
    </div>
    <div class="col-md-3">
      
    <div style="margin:10px;">

      <input type="checkbox" data-width="100%" data-height="20" data-toggle="toggle" name="Supplier_j" value="1" data-on="Active" data-off="Not Active">
    </div>
  </div>
  </div>


  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="add_submit">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
<?php 
}

function frm_edit_supplier()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
    <?php 
   
    $xQx=getEdit_Supplier($_SESSION['editsupid']);
    while($row=mysqli_fetch_array($xQx))
    {
        echo "<input type='text' class='form-control' id='SupId' name='eSupplier_k'  style='position:absolute;z-index:-1;opacity:0;' value='".$row[12]."'>";
    ?>

    <div class="row">
        <div class="col-md-12">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Suppliers Name</button>
                    </div>
                    <?php echo " <input type='text' class='form-control'  name='eSupplier_a'  value='".$row[0]."'>"; ?>

        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Contact Person</button>
                    </div>
                    <?php echo " <input type='text' class='form-control'  name='eSupplier_b'  value='".$row[1]."'>"; ?>
        </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                    </div>
                    
                <select name="eSupplier_c"  class="form-control" >
                    <?php 
                      
                          $xQx=getSup_BusType($row[9]);
                          $rowx=mysqli_fetch_array($xQx);
                           echo "<option value='". $rowx[0]."' Selected>SELECTED -> ". $rowx[1]."</option>";

                    
                          $xQx=getallSup_BusType();

                          while($rowx=mysqli_fetch_array($xQx))

                          {
                            echo "
                            <option value='".$rowx[0]."' >".$rowx[1]."</option>
                            ";
                          }
                    ?>


                    <?php /* echo "<option value='". $row[9]."' Selected>SELECTED -> ". $row[9]."</option>"; */ ?>
                    <!-- <option value="1">1</option>
                    <option value="2">2</option>    
                    <option value="3">3</option>     -->
                </select>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="input-group margin">
                <div class="input-group-btn">
                <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Address</button>
                </div>
                <?php echo " <input type='text' class='form-control'  name='eSupplier_d'  value='".$row[4]."'>"; ?>
        </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-6">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Telephone No</button>
                    </div>
                    <?php echo " <input type='text' class='form-control'  name='eSupplier_e'  value='".$row[2]."'>"; ?>
        </div>
        </div>
        <div class="col-md-6">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Fax No</button>
                    </div>
                    <?php echo " <input type='text' class='form-control'  name='eSupplier_f'  value='".$row[3]."'>"; ?>
        </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Email</button>
                    </div>
                    <?php echo " <input type='text' class='form-control'  name='eSupplier_g'  value='".$row[5]."'>"; ?>
        </div>
        </div>
    </div>

    
   
        

    <div class="row">
        <div class="col-md-12">
        <center>
                <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>        
                <?php echo" <textarea  style='width:98%; resize: none;' rows='5' class='form-control'  name='eSupplier_h'  >".$row[7]." </textarea>"; ?>
        </center>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
        <div class="input-group margin">
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Suppliers Type</button>
                    </div>
                

                    <select name="eSupplier_i"  class="form-control"  >
                    <?php echo " <option value='".$row[6]."' Selected>SELECTED -> ".$row[6]."</option>"?>
                        <option value=" "> </option>
                        <option value="Potential">Potential</option>
                        <option value="Accredited">Accredited</option>
                
                    </select>

                   
                    
        </div>
        </div>
        
        <div class="col-md-6">

    


        <div style="padding-top: 10px;">
        
                    <?php 
                    if($row[8]=='1')
                    {
                       ?>

                      <select name="eSupplier_j"  class="form-control"  >
                   
                        
                        <option value="1" selected>Active</option>
                        <option value="0" >Not Active</option>
                
                    </select>

                       <?php
                    }
                    else
                    {
                      ?>
                     <select name="eSupplier_j"  class="form-control"  >
                   
                        
                        <option value="1">Active</option>
                        <option value="0" selected>Not Active</option>
                
                    </select>
                      <?php
                    }
                    ?>
                        
           
                    
        </div>
        
        </div>
    </div>


    <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="editSuppliers">Submit</button>
    </form>  

    <br>
    <br>
    <div class="divider"></div>
    <?php 
    }

}

function frm_view_itemsinvo()

{


?>

<div class="row">
  <div class="col-md-3">
    Asset Name
  </div>
  <div class="col-md-3">
    Sell Price
  </div>
  <div class="col-md-3">
    Handled
  </div>
  <div class="col-md-3">
    Date Added
  </div>
</div>

<?php
 $x=$_SESSION['viewinvo'];
    global $conn;
$quermont=mysqli_query($c1,"SELECT * FROM items_ordered WHERE invoiceId= '$x' and isDeleted='0'"); 
while ($row=mysqli_fetch_array($quermont)) {






  ?>
<div class="row">
  <div class="col-md-3">
    <?php echo $row[2];?>
  </div>
  <div class="col-md-3">
  <?php echo $row[5];?>
  </div>
  <div class="col-md-3">
      <?php echo $row[7];?>
  </div>
  <div class="col-md-3">
  <?php echo $row[0];?>
  </div>
</div>
<?php
}

}




function frm_add_itemsinvo()

{

?>

<script>
  

function getState(val) {
    $.ajax({
    type: "POST",
    url: "lv_getitems.php",
    data:'positionname='+val,
    success: function(data){
        $("#item_stock").html(data);
    }
    });
}

</script>
  <div class="divider"></div>




      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Item</button>
                  </div>
                
              <select name="items_a"  class="form-control" onChange="getState(this.value)" required >
                 <option value=" " Selected> </option>
                 <?php $xQx=getItems();
                 
                      while($row=mysqli_fetch_array($xQx))

                      { 
                        echo "

                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>

     <!--   <input type='text' class='form-control'  name='Client_m'  value='".$row[13]."> -->
       <div id="item_stock">

</div>

   




<br><br>






<?php
}

function frm_edit_client_a()
{
  ?>
  <div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

     <?php 
 
    $xQx=getEdit_Clients($_SESSION['editclientid']);
    while($row=mysqli_fetch_array($xQx))
    {
        echo "<input type='text' class='form-control' id='clientId' name='clientId'  style='position:absolute;z-index:-1;opacity:0;' value='".$row[0]."'>";
    ?>

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Company</button>
                  </div>
                
                  <?php echo " <input type='text' class='form-control'  name='Client_a'  value='".$row[1]."'>"; ?>

      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Contact Person</button>
                  </div>
              

                  <?php echo " <input type='text' class='form-control'  name='Client_c'  value='".$row[3]."'>"; ?>
      </div>
    </div>

    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                
              <select name="Client_b"  class="form-control" required>
               
                 <?php 
                      
                          $xQx=getSup_BusType($row[2]);
                          $rowx=mysqli_fetch_array($xQx);
                           echo "<option value='". $rowx[0]."' Selected>SELECTED -> ". $rowx[1]."</option>";

                    
                          $xQx=getallSup_BusType();

                          while($rowx=mysqli_fetch_array($xQx))

                          {
                            echo "
                            <option value='".$rowx[0]."' >".$rowx[1]."</option>
                            ";
                          }
                    ?>
                 
              
              </select>
      </div>
    </div>

  </div>

  <div class="row">
  
    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">TIN</button>
            </div>
  
            <?php echo " <input type='text' class='form-control'  name='Client_k'  value='".$row[11]."'>"; ?>
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">SC TIN</button>
            </div>
           
            <?php echo " <input type='text' class='form-control'  name='Client_m'  value='".$row[13]."'>"; ?>
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">OSCA/PWD/ID No.</button>
            </div>
           
            <?php echo " <input type='text' class='form-control'  name='Client_l'  value='".$row[12]."'>"; ?>
      </div>
    </div>

  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Address</button>
                  </div>
                  <?php echo " <input type='text' class='form-control'  name='Client_d'  value='".$row[4]."'>"; ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Telephone No.</button>
                  </div>
                  <?php echo " <input type='text' class='form-control'  name='Client_e'  value='".$row[5]."'>"; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Mobile No.</button>
                  </div>
                  <?php echo " <input type='text' class='form-control'  name='Client_g'  value='".$row[7]."'>"; ?>
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Fax No.</button>
                  </div>
                  <?php echo " <input type='text' class='form-control'  name='Client_f'  value='".$row[6]."'>"; ?>
      </div>
    </div>

  </div>

  
  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Email</button>
                  </div>
                  <?php echo " <input type='email' class='form-control'  name='Client_h'  value='".$row[8]."'>"; ?>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Date Created</button>
                  </div>
               
                  <?php echo " <input type='date' class='form-control'  name='Client_i' style='cursor:default;' disabled value='".$row[9]."'>"; ?>
                

              
      </div>
    </div>
  </div>
    

  <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>
          
              <?php echo " <textarea  style='width:98%; resize: none;' rows='5' class='form-control'  name='Client_j'  >".$row[10]."</textarea>"; ?>        
             
    </center>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">TAX Status</button>
                  </div>
              <select name="Client_n"  class="form-control"  required>
                <?php echo " <option value='".$row[14]."' Selected>SELECTED -> ".$row[14]."</option>"; ?> 
                <option value=" "> </option>
                <option value="Vatable">Vatable</option>
                <option value="Non Vatable">Non Vatable</option>
         
              </select>
                  
      </div>
    </div>
    <div class="col-md-3">
    <div style="margin:10px;">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">isActive</button>
    </div>
    </div>
    <div class="col-md-3">
    <div class="input-group margin">
      <center>
                  <label class="switch">
                
                    <?php 
                    if($row[15]=='1')
                    {
                        echo '<input type="checkbox" checked name="Client_o" value="1" >';
                    }
                    else
                    {
                        echo '<input type="checkbox" name="Client_o" value="1" >';
                    }
                    ?>
                    <span class="slider"></span>
                  </label>
                 
      </center>
    </div>
    </div>
  </div>
                

  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="editClient">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>

  <?php 
    }
}


function frm_add_client()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Company</button>
                  </div>
                  <input type="text" class="form-control"  name="Client_a"  required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Contact Person</button>
                  </div>
                  <input type="text" class="form-control"  name="Client_c"  required>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                
              <select name="Client_b"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php $xQx=getallSup_BusType();
                 
                      while($row=mysqli_fetch_array($xQx))

                      {
                        echo "
                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">TIN</button>
            </div>
            <input type="text" class="form-control"  name="Client_k"  >
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">SC TIN</button>
            </div>
            <input type="text" class="form-control"  name="Client_m"  >
      </div>
    </div>

    <div class="col-md-4">
      <div class="input-group margin">
            <div class="input-group-btn">
              <button type="button" class="btn btn-block btn-primary btn-flat size-125px">OSCA/PWD/ID No.</button>
            </div>
            <input type="text" class="form-control"  name="Client_l"  >
      </div>
    </div>

  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Address</button>
                  </div>
                  <input type="text" class="form-control"  name="Client_d"  >
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Telephone No.</button>
                  </div>
                  <input type="number" class="form-control"  name="Client_e"  required>
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Mobile No.</button>
                  </div>
                  <input type="number" class="form-control"  name="Client_g"  >
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Fax No.</button>
                  </div>
                  <input type="number" class="form-control"  name="Client_f"  >
      </div>
    </div>
  </div>

  
  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Email</button>
                  </div>
                  <input type="text" class="form-control"  name="Client_h" >
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Date Created</button>
                  </div>
                  <input type="date" class="form-control"  name="Client_i" value="<?php echo date("Y-m-d");?>" >
                

              
      </div>
    </div>
  </div>
    

  <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>
              <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="Client_j"  ></textarea>
    </center>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">TAX Status</button>
                  </div>
              <select name="Client_n"  class="form-control"  required>
                <option value=" " Selected> </option>
                <option value="Vatable">Vatable</option>
                <option value="Non Vatable">Non Vatable</option>
         
              </select>
                  
      </div>
    </div>
    <div class="col-md-3">
    <div style="margin:10px;">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">isActive</button>
    </div>
    </div>
    <div class="col-md-3">
    <div class="input-group margin">
      <center>
                  <label class="switch">
                    <input type="checkbox" name="Client_o" value="1"  >
                    <span class="slider"></span>
                  </label>
                 
      </center>
    </div>
    </div>
  </div>


  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addClient">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
<?php 
}

?>




<?php 




function frm_edit_stocks()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
<?php
  $x=  $_SESSION['editassetid'];
    global $conn;
 $xQx  = "SELECT assetsId,serialName,`code`,itmTypeId,unitPrice,supId ,date_purchased,endofWarranty_date,delivery_date,remarks FROM assetstwo AS a  where assetsId='$x'";

 $query=mysqli_query($conn,$xQx);
 $row=mysqli_fetch_array( $query);


      echo "

       <input type='text' class='form-control'  style='display:none;' name='Estock_z'  style='' value='".$row[0]."'>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Serial Number</button>
                  </div>
                  <input type='text' class='form-control'  name='Estock_a'  style='' value='".$row[1]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Code</button>
                  </div>
                  <input type='text' class='form-control'  name='Estock_b'  style='' value='".$row[2]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Item Group</button>
                  </div>";

                 $ig=mysqli_fetch_array(mysqli_query($conn,"SELECT groupName from groups where groupid='".$row[3]."'"));

                       echo "  <select name='Estock_c'  class='form-control' required>


                 <option value='".$row[3]."' Selected>SELECTED -> ".$ig[0]." </option>";
                   $xQx=getGroup();
                 
                      while($row2=mysqli_fetch_array($xQx))

                      {
                        echo "
                        <option value='".$row2[0]."' >".$row2[1]."</option>
                        ";
                      }
         
                 echo "
              </select>
                 
                  </div>



           
              

                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Unit Price</button>
                  </div>
                  <input type='text' class='form-control'  name='Estock_d'  style='' value='".$row[4]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Supplier</button>
                  </div>";


                 $sup1=mysqli_fetch_array(mysqli_query($conn,"SELECT supName from suppliers where supId='".$row[5]."'"));
             echo"

                   <select name='Estock_e'  class='form-control' required>
                 <option value='".$row[5]."' Selected>SELECTED -> ".$sup1[0]." </option>
           "; 
                      $xQx=getSupplier();
                 
                      while($row1=mysqli_fetch_array($xQx))

                      {
                        echo '
                        <option value="'.$row1[0].'" >'.$row1[1].'</option>
                        ';
                      }
            echo "
              
              </select>                    
         
                  </div>   
          
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date Purchased</button>
                  </div>
                  <input type='text' class='form-control' name='Estock_f'   style='' value='".$row[6]."'>
                  </div>                         
    
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>End of Warranty</button>
                  </div>
                  <input type='text' class='form-control' name='Estock_g'   style='' value='".$row[7]."'>
                  </div>    
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Delivery Date</button>
                  </div>
                  <input type='text' class='form-control'  name='Estock_h'  style='' value='".$row[8]."'>
                  </div>    

               
                    <div class='row'>
    <div class='col-md-12'>
    <center>
              <button type='button' class='btn btn-block btn-primary btn-flat' style='width:97%; '>Remarks</button>
              <textarea  style='width:97%; resize: none;' name='Estock_i' rows='5' class='form-control'    >".$row[9]."</textarea>
    </center>
    </div>
  </div>
             
              ";?>
<br>
 
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="editStock">Update</button>
  <span style="float:right;opacity:0; padding:0px 20px;">&nbsp;</span>
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="updateSave">Copy</button>

  </form>  

 <br>
  <br>
  <div class="divider"></div>
    <?php 
    
}

?>

<?php 

function viewformstockdetails()
{
 $x=$_SESSION['viewassetid'];
    global $conn;
 $xQx  = "SELECT assetsId,serialName,`code`,(SELECT ig.groupName FROM groups AS ig WHERE ig.groupid=.a.itmTypeId),unitPrice,(SELECT b.supName FROM suppliers AS b WHERE b.supId = a.supId) ,date_purchased,endofWarranty_date,delivery_date,remarks FROM assetstwo AS a  where assetsId='$x'";

 $query=mysqli_query($conn,$xQx);
 $row=mysqli_fetch_array( $query);


      echo "
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Serial Number</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[1]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Code</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[2]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Item Group</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[3]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Unit Price</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[4]."'>
                  </div>
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Supplier</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[5]."'>
                  </div>                         
         
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Date Purchased</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[6]."'>
                  </div>                         
    
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>End of Warranty</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[7]."'>
                  </div>    
                  <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-125px'>Delivery Date</button>
                  </div>
                  <input type='text' class='form-control'   disabled style='' value='".$row[8]."'>
                  </div>    

               
                    <div class='row'>
    <div class='col-md-12'>
    <center>
              <button type='button' class='btn btn-block btn-primary btn-flat' style='width:97%; '>Remarks</button>
              <textarea  style='width:97%; resize: none;' disabled rows='5' class='form-control'  name='Supplier_j'  >".$row[9]."</textarea>
    </center>
    </div>
  </div>
             
              ";
}
?>


 <?php 


function frm_edit_groups()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Category Name</button>
                  </div>
                  <input type="text" class="form-control"  name="Category_a"  required>
      </div>
    </div>
  </div>





  <div class="row">
    <div class="col-md-6">
         <!--<div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Suppliers Type</button>
                  </div>
              <select name="Supplier_k"  class="form-control"  required>
                <option value=" " Selected> </option>
                <option value="Potential">Potential</option>
                <option value="Accredited">Accredited</option>
         
              </select>
                  
      </div> -->
    </div>
    <div class="col-md-3">
    <!--<div style="margin:10px;">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">isActive</button>
    </div> -->
    </div>
    <div class="col-md-3">
       <!-- <div class="input-group margin">
      <center>
                  <label class="switch">
                    <input type="checkbox" name="Supplier_l" value="1"  >
                    <span class="slider"></span>
                  </label>
                 
      </center>
    </div> -->
    </div>
  </div>
<br>
 
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addSuppliers">Save</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
    <?php 
    
}

?>




<?php 


function frm_add_groups()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Category Name</button>
                  </div>
                  <input type="text" class="form-control"  name="groupa"  required>
      </div>
    </div>
  </div>

 <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Maintaining Stock</button>
                  </div>
                  <input type="text" class="form-control"  name="groupb"  required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Model Name</button>
                  </div>
                  <input type="text" class="form-control"  name="groupc"  required>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Brand Name</button>
                  </div>
                  <input type="text" class="form-control"  name="groupd"  required>
      </div>
    </div>
  </div>



  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Sell Price</button>
                  </div>
                  <input type="number" class="form-control"  name="groupe"  required>
      </div>
    </div>
  </div>


   <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Specification</button>
              <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="groupf"  required></textarea>
    </center>
    </div>
  </div>
<br>
 
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addGroups">Save</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
<?php 
}

?>



<?php 


function frm_add_stocks()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Tag/Code</button>
                  </div>
                 <?php 
                 if (!empty($_SESSION['stock_a']))
                  {
                    echo ' <input type="text" class="form-control"  name="stock_a"  value="'.$_SESSION['stock_a'].'" required>';
                  }
                  else
                  {
                    echo ' <input type="text" class="form-control"  name="stock_a"  required>';
                  }
                 ?> 
      </div>
    </div>

    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">S/N</button>
                  </div>
           <input type="text" class="form-control"  name="stock_b"  required>
    </div>
  </div>

  </div>


  <div class="row">

    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Supplier</button>
                  </div>
                
              <select name="stock_c"  class="form-control" required>
                 <?php 
                 if (!empty($_SESSION['stock_c']))
                  {
                 echo '<option value="'.$_SESSION['stock_c'].'" Selected>'.$_SESSION['stock_c'].' </option>';
                  }
                  else
                  {
                  echo '<option value=" " Selected> </option>';
                  }

                 ?>
                 <?php $xQx=getSupplier();
                 
                      while($row=mysqli_fetch_array($xQx))

                      {
                        echo "
                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>
    </div> 
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Item Group</button>
                  </div>
                
              <select name="stock_d"  class="form-control" required>
                  <?php 
                 if (!empty($_SESSION['stock_d']))
                  {
                 echo '<option value="'.$_SESSION['stock_d'].'" Selected>'.$_SESSION['stock_d'].' </option>';
                  }
                  else
                  {
                  echo '<option value=" " Selected> </option>';
                  }

                 ?>
                 <?php $xQx=getGroup();
                 
                      while($row=mysqli_fetch_array($xQx))

                      {
                        echo "
                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>
    </div>
  </div>


 

  
  <div class="row">
    
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Unit Price</button>
                  </div>
                <?php 
                 if (!empty($_SESSION['stock_e']))
                  {
                    echo ' <input type="text" class="form-control"  name="stock_e"  value="'.$_SESSION['stock_e'].'" required>';
                  }
                  else
                  {
                    echo ' <input type="text" class="form-control"  name="stock_e"  required>';
                  }
                 ?> 

              
      </div>
    </div>


  </div>
    

  <div class="row">
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Date of Purchase</button>
                  </div>
                  <?php 
                 if (!empty($_SESSION['stock_f']))
                  {
                    echo ' <input type="date" class="form-control"  name="stock_f"  value="'.$_SESSION['stock_f'].'" required>';
                  }
                  else
                  {
                    echo ' <input type="date" class="form-control"  name="stock_f"  required>';
                  }
                 ?> 

              
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">End of Warranty</button>
                  </div>
                   <?php 
                 if (!empty($_SESSION['stock_g']))
                  {
                    echo ' <input type="date" class="form-control"  name="stock_g"  value="'.$_SESSION['stock_g'].'" required>';
                  }
                  else
                  {
                    echo ' <input type="date" class="form-control"  name="stock_g"  required>';
                  }
                 ?> 

              
      </div>
    </div>
    <div class="col-md-4">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Delivery Date</button>
                  </div>
                     <?php 
                 if (!empty($_SESSION['stock_h']))
                  {
                    echo ' <input type="date" class="form-control"  name="stock_h"  value="'.$_SESSION['stock_h'].'" required>';
                  }
                  else
                  {
                    echo ' <input type="date" class="form-control"  name="stock_h"  required>';
                  }
                 ?> 

              
      </div>
    </div>

  </div>

  <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>

                   <?php 
                 if (!empty($_SESSION['stock_i']))
                  {
                    echo ' <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="stock_i" required>'.$_SESSION['stock_i'].'</textarea>';
                  }
                   else
                  {
                    echo ' <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="stock_i" required></textarea>';
                  }
                  ?>
              
    </center>
    </div>
  </div>

  
<br>
 
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addstocks">Save</button>
    <span   style="float:right;opacity:0; padding:0px 20px;">&nbsp;</span>
  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="copysave">Copy & Save</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
<?php 
}


function frm_invoice_items()
{

?>




<?php
}





?>


