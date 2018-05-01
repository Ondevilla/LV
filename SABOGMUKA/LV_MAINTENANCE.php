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
<div class="box box-primary" style="padding:20px;">
   <p>Add Business Type</p>
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
<BR>
<br>
</div>


<br>

<div class="box box-danger" style="padding:20px;">
  <p>Delete Business Type</p>

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

<BR>
<br>
</div>



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
<div class="box box-primary" style="padding:20px;">
     <p>Add Category Type</p>
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

<BR>
<br>
</div>

<br>
<div class="box box-danger" style="padding:20px;">
     <p>Delete Category Type</p>

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
<BR>
<br>
</div>

</div>
             

    
            
</div>



















<div class="col-md-12">         

<p></p>
    <button class="btn btn-primary col-md-11" type="button" data-toggle="collapse" data-target="#services" aria-expanded="false" aria-controls="services">
       Services 
    </button>

<div class="collapse col-md-11" id="services">
<br>
<div class="box box-primary" style="padding:20px;">
     <p>Add Services</p>
  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Services</button>
                  </div>
                  <input type="text" class="form-control"  name="services"  required>
      </div>
    </div>
  </div>

  <button type="submit" class="btn  btn-success btn-flat"  style="float:right;" name="add_services">Save</button>


</form>

<BR>
<br>
</div>

<br>
<div class="box box-danger" style="padding:20px;">
     <p>Delete Services</p>

  <form  role="form" action="LV_submit.php" method="post"   enctype="multipart/form-data" >
  <div class="row">
    <div class="col-md-12">
      <div class="input-group margin">
                  <div class="input-group-btn">
                    <button type="button" class="btn btn-block btn-primary btn-flat size-125px">Services</button>
                  </div>
                
              <select name="delservices"  class="form-control" required>
                 <option value=" " Selected> </option>
                 <?php

                   $xQx_update = "SELECT * FROM services WHERE isDeleted = '0'";
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

  <button type="submit" class="btn  btn-red btn-flat"  style="float:right;" name="del_services">Delete</button>


</form>
<BR>
<br>
</div>

</div>
             

    
            
</div>











</div>

</body>
</html>