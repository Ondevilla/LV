

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

<script>
  

function getState_services(val) {
    $.ajax({
    type: "POST",
    url: "lv_getservices.php",
    data:'positionname='+val,
    success: function(data){
        $("#item_services").html(data);
    
    }
});
}

</script>



<?php 

if(!isset($_POST['id']))
{
	
?>
    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>
<?PHP
}
else
{
$sample = $_POST['id'];
$_SESSION["invoiceId_submit"] = $sample;
}








?>




     <?php 

include ('connect.config.php');


     $xQx=getItems(); 
  if(mysqli_num_rows($xQx)>0)
{
     ?>


      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Item</button>
                  </div>
                
              <select name="items_a"  class="form-control"  onChange="getState(this.value)" required >
                 <option value="" Selected> SELECT A GROUP</option>
                 <?php 
                 
               
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







   
<?php } 

else{
?>
<!-- <script type="text/javascript">
     swal({
                  title: "No Stocks !",
                  text: "No more stocks on all groups so add stocks immediately !",
                  type: "error",
                  closeOnConfirm: false,
                  showLoaderOnConfirm: true
                });
</script>
 -->
<?php
}
?>


      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Services</button>
                  </div>
                
              <select name="items_a"  class="form-control"  onChange="getState_services(this.value)" required >
                 <option value="" Selected> SELECT FROM SERVICES</option>
                 <?php 
                 
               
  $xQx = "SELECT * FROM services WHERE isDeleted = '0'";
  $query_invoice=mysqli_query($conn,$xQx);

                      while($row=mysqli_fetch_array($query_invoice))

                      { 
                        echo "

                        <option value='".$row[0]."' >".$row[1]."</option>
                        ";
                      }
                 
                 ?>
              
              </select>
      </div>

     <!--   <input type='text' class='form-control'  name='Client_m'  value='".$row[13]."> -->
       <div id="item_services">

</div>

<br><br>




  <div class="divider"></div>

<?php

?>