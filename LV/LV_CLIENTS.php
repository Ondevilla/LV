<div class="wrapper" style="background-color:transparent;">

<div><p>MANAGE CLIENTS</p></div>

<style>

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
  
 <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script> 
<script>
$(document).ready(function(){
    $('#ManageClients').DataTable({
      "aoColumns": [
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
frm_add_client();
?>
</div>


<br>
<br>
<div class="box box-primary" style="padding: 20px;">
<?php
tbl_client();
?>

</div>



</div>




