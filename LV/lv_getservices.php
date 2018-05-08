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


  $xQx = "SELECT * FROM services WHERE isDeleted = '0'";
  $query_invoice_services=mysqli_query($conn,$xQx);



  if(mysqli_num_rows($query_invoice_services)>0)
    {
    

?>

              <br>

              </div>
                <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
                  <div class="box box-primary" style="padding:10px;">
<h6>Select an item</h6>
              <?php
              $namaiwa=0;

              $sellpricesss="";
              while($rowsss=mysqli_fetch_array($query_invoice_services))

              {
               
                echo ' 
            <div class="col-md-6" style="padding:10px;  ">           
<label class="chk1">
  <input type="checkbox"   name="SN_services_a'.$namaiwa.'" value="'.$rowsss[0].'"> '.$rowsss[1].'</input>
  <span class="checkmark"></span>
</label>
           
          </div>      

               

                '

              ;

              $namaiwa+=1;
              }


              $_SESSION['SN_services']=$namaiwa;


              ?>
                      <br>
                  <br>

                     <br>
                        <br>
                           <br>
                              <br>    </div>
                            <hr>
               
               <div class="row" >  
               



                 <div class="col-md-2" > 
                    <div class="input-group margin">
                                <div class="input-group-btn">
                                   <button type="submit" class="btn  btn-success btn-flat btn-block" id="sus"  style="opacity:1;" name="addItems_services">Submit</button>
                                </div>
          
                  </div>
                </div>

                  
                </div>

   

            
              </form>

<?php 
      } 

}
?>

