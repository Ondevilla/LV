


<div class="wrapper" style="background-color:transparent;">



<?php 




?>
<div><p>MANAGE PAYOUT</p></div>

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
          null, 
          { "orderSequence": [ "" ] }
        
      ]
  } );
    

    $("#addbtn").click(function(){
        $("#panel").slideToggle("slow");
    });


});










</script>



    


<div id="panel">

</div>

<?php 
if(isset($_POST["invoice_paid"]))

{
      

    $get_value = $_POST["invoice_paid"];

$xQx_update = "UPDATE invoices SET Status = '2' WHERE invoiceId = '$get_value'";
 $query_update=mysqli_query($conn,$xQx_update);


?>




    <?php 




}

 














if(!isset($_POST["invoice_paid"]))
{

?>
    <script>   
    window.location.href="admin.php?x=PAID%20INVOICE";
    </script>
<?php
}
$invoice_id = $_POST["invoice_paid"];
$_SESSION["get_invoiceId"] = $invoice_id;

 $xQx_get_details = "SELECT * FROM invoices WHERE invoiceId = $invoice_id AND isDeleted = '0'";
  $query_get_details=mysqli_query($conn,$xQx_get_details);         


                      while($row=mysqli_fetch_array($query_get_details))

                      { 

                        $clientId = $row["clientId"];
                        $bustypeId = $row["bustypeId"];

                      }

          
 $xQx_get_cname = "SELECT * FROM clients WHERE clientId = $clientId";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 

                        $clientName = $row["clientName"];
                        $checkVat = $row["tax_status"];

                      }

$_SESSION["checkVat"] = $checkVat;
$_SESSION["cName"] = $clientName;
$cName = $_SESSION["cName"];
 $xQx_get_busname = "SELECT * FROM businesstypes WHERE busTypeId = $bustypeId";
  $query_get_busname=mysqli_query($conn,$xQx_get_busname);         


                      while($row=mysqli_fetch_array($query_get_busname))

                      { 

                        $busName = $row["busTypeName"];

                      }










?>

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> Lightvend Inc.
            <small class="pull-right">&nbsp;</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <strong>Lightvend Inc.</strong><br>
            123 Boni. Ave., Barangka Drive<br>
            Mandaluyong, 1550<br>
            Phone: (804) 123-5432<br>
            Email: lightvend@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>

  <?php 

 $xQx_invoices = "SELECT * FROM invoices WHERE invoiceId = $invoice_id AND isDeleted = '0'";
  $query_invoices=mysqli_query($conn,$xQx_invoices);         


                      while($row=mysqli_fetch_array($query_invoices))

                      { 
  ?>
            <strong><?php echo $cName; ?></strong><br>
            123 Boni. Ave., Barangka Drive<br>
            Mandaluyong, 1550<br>
            Phone: (804) 123-5432<br>
            Email: lightvend@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Invoice #<?php echo $row["invoiceStatId"]; ?></b><br>
          <br>
          <b>Order ID:</b> <?php echo $row["invoiceId"]; ?><br>
          <b>Payment Due:</b> <?php echo $row["due_date"]; ?><br>
          
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<?php 

}

?>



      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
  
              <th>Product</th>
              <th>Serial #</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody>




            <?php 
 $xQx_items_ordered = "SELECT * FROM items_ordered WHERE invoiceId = $invoice_id AND isDeleted = '0'";
  $query_items_ordered=mysqli_query($conn,$xQx_items_ordered);         


                      while($row=mysqli_fetch_array($query_items_ordered))

                      { 
            ?>
            <tr>

            
              <td><?php echo $row["assetName"]; ?></td>
              <td><?php echo $row["assetsId"]; ?></td>
              <td><?php echo number_format($row["sellPrice"]); ?></td>
            </tr>

          <?php 
}

          ?>
            </tbody>
          </table>


        </div>
        <!-- /.col -->
      </div>



      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
<!--           <p class="lead">Payment Methods:</p>
          <img src="../../dist/img/credit/visa.png" alt="Visa">
          <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
          <img src="../../dist/img/credit/american-express.png" alt="American Express">
          <img src="../../dist/img/credit/paypal2.png" alt="Paypal">

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
Terms and Conditions Here.
          </p> -->
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          <p class="lead"><?php echo $row["due_date"]; ?></p>

          <div class="table-responsive">
            <table class="table">
              



  <?php 
$sp="";


   $xQx_sellprice = "SELECT * FROM items_ordered WHERE invoiceId = $invoice_id AND isDeleted = '0'";
  $query_sellprice=mysqli_query($conn,$xQx_sellprice);         


                      while($row=mysqli_fetch_array($query_sellprice))

                      {  
                        ?>
 <tr>                       
 <th style="width:50%">Subtotal:</th>
<td><?php $row["sellPrice"] ; 


$sp[].=$row["sellPrice"];

$spri=array_sum($sp);
echo number_format($spri);

?></td>
</tr>
<?php
}

$checkVat_new = $_SESSION["checkVat"];
if($checkVat_new = "Vatable")

{

  $tax_value = 00.12;
  $tax_value_string = "12% Tax";

}
else

{

  $tax_value = 0.00;
  $tax_value_string = "Non Vatable";

}

$tot=array_sum($sp);
?>


              <tr>


                <th style="width:50%" >Tax: &nbsp;
                  <?php echo $tax_value_string; ?></th>   
                  <td><?php echo number_format($tot* $tax_value); ?></td> 
  </tr>
  <tr>       
                <th>Total:</th>



                <th><?php

                 
             

                
                  $totx =  $tot + ($tot* $tax_value);
                echo number_format($totx);
                ?></th>


              </tr>



            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>

      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
<!--           <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a> -->
    
          <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target="#payout"><i class="fa fa-credit-card" ></i> Proceed Payment
          </button>
<!--           <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button> -->
        </div>
      </div>
    </section>




</div>

   
  <div id='payout' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>INFORMATION </h4>
        </div>
        <div class='modal-body'>


          <form  role='form' action='payout.php' method='post'  enctype='multipart/form-data'>

                   <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-200px'><b>Total Amount</b></button>
                  </div>
                  <input type="hidden" name="total_amount" value='<?php echo $totx;?>'>
                  <input type='text' class='form-control'     style='' value='<?php echo number_format($totx);?>' disabled>
                  </div>
      <br>
                   <div class='input-group margin'>
                  <div class='input-group-btn'>
                  <button type='button' class='btn btn-block btn-primary btn-flat size-200px'><b>Enter Payment Amount</b></button>
                  </div>
                  <input type='number' class='form-control' name = "paid_amount"  style='' min='<?php echo (int)$totx;?>'  required>
                  </div>

        </div>
        
                <div class='modal-footer'>
       <button type='submit' name='payout'  class='btn btn-success'>Yes</button>
                        
        </form>


      </div>
    </div>


  </div>;



