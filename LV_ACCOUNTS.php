<div class="wrapper" style="background-color:transparent;">

<?php

if( $_SESSION["access"]!=1)
{
  ?>
<script type="text/javascript">
  window.location.href="admin.php";
</script>
  <?php
}

?>

<div><p>MANAGE ACCOUNTS</p></div>

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

#panel,#panel1 {
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
    $('#accounts').DataTable({

      "aoColumns": [
          null,
          null,
          null,
         null,
          { "orderSequence": [ "" ] }
        
      ]

  } );
    
var table = $('#accounts').DataTable();
 
// Sort by columns 1 and 2 and redraw
table
    .order( [[ 3, 'desc' ]] )
    .draw();

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
frm_add_account();
?>
</div>



<br>
<br>

<?php
tbl_accounts();
?>


</div>





