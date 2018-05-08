<?php include("connect.config.php"); ?>
<script>
  

function getState(val) {
    $.ajax({
    type: "POST",
    url: "client.php",
    data:'positionnames='+val,
    success: function(data){
        $("#item_stocks").html(data);
    }
    });
}

</script>

      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Client Person</button>
                  </div>
              <select name="invoice_b"  class="form-control" onChange="getState(this.value)" required>
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

      <div id="item_stocks">







      </div>