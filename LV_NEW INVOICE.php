<div class="wrapper" style="background-color:transparent;">



<?php 




function frm_add_invoice_item()
{
?>
<div class="divider"></div>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >

  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px" >Invoice No.</button>
                  </div>
                  <input type="number" class="form-control"  name="invoice_a"  required>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Client Person</button>
                  </div>
              <select name="invoice_b"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php 
global $conn;
  $xQx_get_cname = "SELECT * FROM clients WHERE isDeleted ='0'";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 
                        echo "
                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 ?>
              
              </select>
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                
              <select name="invoice_c"  class="form-control" required>
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
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Date</button>
                  </div>
                  <input type="date" class="form-control"  name="invoice_d" value="<?php echo date("Y-m-d");?>" >
                

              
      </div>
    </div>
    <div class="col-md-6">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Due Date</button>
                  </div>
                  <input type="date" class="form-control"  name="invoice_e" value="<?php echo date("Y-m-d");?>" >
                

              
      </div>
    </div>
  </div>
    

  <div class="row">
    <div class="col-md-12">
    <center>
              <button type="button" class="btn btn-block btn-primary btn-flat" style="width:98%; ">Remarks</button>
              <textarea  style="width:98%; resize: none;" rows="5" class="form-control"  name="invoice_f"></textarea>
    </center>
    </div>
  </div>
<br>


  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="addInvoice">Submit</button>
  </form>  

  <br>
  <br>
  <div class="divider"></div>
<?php 
}


?>
<div><p>MANAGE INVOICES</p></div>

<style>
  .switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
  background-color:#3c8dbc;
  border-color:#367fa9;
  
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */

#panel {
    padding-top: 50px;
    padding-bottom: 50px;
    display: none;
 
}
.size-125px {
  width:125px;
  cursor:default;
}
.divider
{
  background:#222d32;
  width:100%;
  height:20px;
}
input::-webkit-inner-spin-button {
  -webkit-appearance: none;
}

</style>
     
<script>
$(document).ready(function(){
    $('#ManageClients').DataTable({
      "aoColumns": [
          null,
          null, 
          null,
          null, 
          { "orderSequence": [ "" ] }
        
      ]
  } );
    

    $("#addbtn").click(function(){
        $("#panel").slideToggle("slow");
    });


});










</script>



    

    <div class="rows">
            <div class="col-md-12" id="addbtn">
                <button type="button"  class="btn btn-block btn-success btn-flat">ADD</button>
            </div>
    </div>

<div id="panel">
<?php
frm_add_invoice_item();
?>
</div>


<br>
<br>

<?php
tbl_invoice();
?>




</div>




