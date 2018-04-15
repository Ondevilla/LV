<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>



<div class="container">

<div class="col-md-12">         


    <button class="btn btn-primary col-md-11" type="button" data-toggle="collapse" data-target="#busType" aria-expanded="false" aria-controls="busType">
        Business Type
    </button>

<div class="collapse col-md-11" id="busType">
<br>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                  <input type="text" class="form-control"  name="busType"  required>
      </div>
    </div>
  </div>

  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="add_busType">Save</button>


</form>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Business Type</button>
                  </div>
                
              <select name="delbusType"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php

                   $xQx_update = "SELECT * FROM businesstypes WHERE isDeleted = '0'";
                    $query_update=mysqli_query($conn,$xQx_update);
                 
                      while($row=mysqli_fetch_array($query_update))

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

  <button type="submit" class="btn  btn-red btn-flat"  style="float:right;" name="del_busType">Delete</button>


</form>



    <p></p>

</div>
    <br>         

    
            
</div>



<div class="col-md-12">         

<p></p>
    <button class="btn btn-primary col-md-11" type="button" data-toggle="collapse" data-target="#categType" aria-expanded="false" aria-controls="categType">
       Category 
    </button>

<div class="collapse col-md-11" id="categType">
<br>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Category Type</button>
                  </div>
                  <input type="text" class="form-control"  name="catType"  required>
      </div>
    </div>
  </div>

  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="add_catType">Save</button>


</form>


  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Category Type</button>
                  </div>
                
              <select name="delcatType"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php

                   $xQx_update = "SELECT * FROM categories WHERE isDeleted = '0'";
                    $query_update=mysqli_query($conn,$xQx_update);
                 
                      while($row=mysqli_fetch_array($query_update))

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

  <button type="submit" class="btn  btn-red btn-flat"  style="float:right;" name="del_catType">Delete</button>


</form>


</div>
             

    
            
</div>









</div>

</body>
</html>