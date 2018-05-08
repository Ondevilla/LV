<style type="text/css">
  
  .chk1 {
    display: block;
    position: relative;
    padding-left: 35px;
  
    cursor: pointer;
   
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
}

/* Hide the browser's default checkbox */
.chk1 input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
}

/* Create a custom checkbox */
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color:  #ccc;
}

/* On mouse-over, add a grey background color */
.chk1:hover input ~ .checkmark {
    background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.chk1 input:checked ~ .checkmark {
    background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}

/* Show the checkmark when checked */
.chk1 input:checked ~ .checkmark:after {
    display: block;
}

/* Style the checkmark/indicator */
.chk1 .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>

<?php 
session_start();


include("connect.config.php");

if(!empty($_POST["positionname"]))
{
 $query_item = $_POST["positionname"];


$_SESSION["assetsId_services"] = $query_item;


}

else
{
  $_SESSION["assetsId_services"] = "empty";
}



if (!empty($query_item))
{


  $xQx = "SELECT * FROM services WHERE isDeleted = '0' and services_id='". $_SESSION["assetsId_services"]."'";
  $query_invoice_services=mysqli_query($conn,$xQx);



  if(mysqli_num_rows($query_invoice_services)>0)
    {
    

    $sorrow=mysqli_fetch_array($query_invoice_services);
   $sell=$sorrow[2];

?>

              <br>

              </div>
                <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data"  class="box box-primary" style="padding:10px;">
              
<h6>Services</h6>
               <input type="hidden" class="form-control"  name="serv_0" value="<?php echo $_SESSION['assetsId_services'];  ?>"   required>

 <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Sell Price</button>
                  </div>
                  <input type="number" class="form-control"  name="serv_a" readonly onkeyup="count()"  id="serv_a"  value="<?php echo  $sell; ?>" required>
      </div>
    </div>

     <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Quantity</button>
                  </div>
                  <input type="number" class="form-control"  name="serv_b" onkeyup="count()"  id="serv_b" required>
      </div>
    </div>

         <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Unit</button>
                  </div>
                  <input type="text" class="form-control"   readonly value="LOT" disabled  required>
      </div>
    </div>

     <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Total Amount</button>
                  </div>
                  <input type="number" class="form-control" readonly id='chk' name="serv_c" >
      </div>
    </div>

                  
                              <br>    </div>
                            <hr>
               
               <div class="row" >  
               



                 <div class="col-md-12" > 
                    <div class="input-group margin">
                                <div class="input-group-btn">
                                   <button type="submit" class="btn  btn-success btn-flat " id="susi"  style="opacity:0;float:right;" name="addItems_services">Submit</button>
                                </div>
          
                  </div>
                </div>

                  
                </div>

   

            
              </form>

<?php 
      } 

}
?>

<script type="text/javascript">
function count()
{
  var y =  document.getElementById('serv_a').value;
  var x =  document.getElementById('serv_b').value;

  document.getElementById('chk').value=x*y;
  if (x>0)
  {
    document.getElementById('susi').style='opacity:1;float:right;';
  }
  else
  {
     document.getElementById('susi').style='opacity:0;float:right;';
  }
}  
</script>