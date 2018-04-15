<?php 
include('LV_queries.php'); 
include('connect.config.php');
include('support/function.php');
session_start();


if (isset($_POST['add_submit']))
{
//

$a = $_POST['Supplier_a'];
$b = $_POST['Supplier_b'];
$c = $_POST['Supplier_c'];
$d = $_POST['Supplier_d'];
$e = $_POST['Supplier_e'];
$f = $_POST['Supplier_f'];
$g = $_POST['Supplier_g'];
$h = $_POST['Supplier_h'];
$i = $_POST['Supplier_i'];







    if(empty($_POST['Supplier_j']))
    {





$xQx = "INSERT INTO suppliers(supName, contactPerson, busTypeId, address, telno, faxno, email, remarks, typeofSup, isActive)VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','0')";
        $query=mysqli_query($conn,$xQx);











    }
    else
    {

$j = $_POST['Supplier_j'];

$xQx = "INSERT INTO suppliers(supName, contactPerson, busTypeId, address, telno, faxno, email, remarks, typeofSup, isActive)VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
        $query=mysqli_query($conn,$xQx);






    }
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=SUPPLIERS";
    </script>  
<?php
}

if (isset($_POST['editSuppliers']))
{
//-----------------------------------------------
   
    if(empty($_POST['eSupplier_j']))
    {
         updSupplier($_POST['eSupplier_a'],$_POST['eSupplier_b'],$_POST['eSupplier_c'],$_POST['eSupplier_d'],$_POST['eSupplier_e'],$_POST['eSupplier_f'],$_POST['eSupplier_g'],$_POST['eSupplier_h'],$_POST['eSupplier_i'],'0',$_POST['eSupplier_k']);
    }
    else
    {
        updSupplier($_POST['eSupplier_a'],$_POST['eSupplier_b'],$_POST['eSupplier_c'],$_POST['eSupplier_d'],$_POST['eSupplier_e'],$_POST['eSupplier_f'],$_POST['eSupplier_g'],$_POST['eSupplier_h'],$_POST['eSupplier_i'],'1',$_POST['eSupplier_k']);    
    }
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=SUPPLIERS";
    </script>
<?php
}



if (isset($_POST['addAccount']))
{
//-----------------------------------------------
 
    
        addAccount($_POST['user1'],encryptIt($_POST['user2']),$_POST['user3'],'1');
    
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=ACCOUNTS";
    </script>
<?php
}

if (isset($_POST['editAccount']))
{
//-----------------------------------------------
 
    
        editAccount($_POST['user1'],encryptIt($_POST['user2']),$_POST['user3'],$_POST['user0']);
    
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=ACCOUNTS";
    </script>
<?php
}

if (isset($_POST['delAccount']))
{
//-----------------------------------------------
 
    
        delAccount($_POST['delId']);
    
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=ACCOUNTS";
    </script>
<?php
}
if (isset($_POST['resAccount']))
{
//-----------------------------------------------
 
    resAccount($_POST['resId']);

    
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=ACCOUNTS";
    </script>
<?php
}



if (isset($_POST['addInvoice']))
{
//-----------------------------------------------
    if(empty($_POST['invoice_a']))
    {

    }
    else
    {

$a = $_POST['invoice_a'];
$b = $_POST['invoice_b'];
$c = $_POST['invoice_c'];
$d = $_POST['invoice_d'];
$e = $_POST['invoice_e'];
$f = $_POST['invoice_f'];

  $xQx_get_cname = "SELECT * FROM clients WHERE clientId = '$b'";
  $query_get_cname=mysqli_query($conn,$xQx_get_cname);         


                      while($row=mysqli_fetch_array($query_get_cname))

                      { 

                        $get_cname = $row["clientName"];


                      }

  $xQx_get_bname = "SELECT * FROM businesstypes WHERE busTypeId = '$c'";
  $query_get_bname=mysqli_query($conn,$xQx_get_bname);         


                      while($row=mysqli_fetch_array($query_get_bname))

                      { 

                        $get_bname = $row["busTypeName"];


                      }


$xQx = "INSERT INTO invoices(invoiceStatId , clientId, clientName, busTypeId, bustypeName, date_created ,due_date ,remarks ,isDeleted,Status)VALUES ('$a','$b','$get_cname','$c','$get_bname','$d','$e','$f','0','0')";
        $query=mysqli_query($conn,$xQx);
    }
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>
<?php
}




if (isset($_POST['delSupplier']))
{
//-----------------------------------------------
delSupplier($_POST['supId']);
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=SUPPLIERS";
    </script>
<?php
}


if (isset($_POST['delReport']))
{
//-----------------------------------------------
delReport($_POST['supId']);
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=REPORTS";
    </script>
<?php
}




if (isset($_POST['addClient']))
{
//-----------------------------------------------
    if(empty($_POST['Client_o']))
    {
        addClient($_POST['Client_a'],$_POST['Client_b'],$_POST['Client_c'],$_POST['Client_d'],$_POST['Client_e'],$_POST['Client_f'],$_POST['Client_g'],$_POST['Client_h'],$_POST['Client_i'],$_POST['Client_j'],$_POST['Client_k'],$_POST['Client_l'],$_POST['Client_m'],$_POST['Client_n'],'0');
    }
    else
    {
        addClient($_POST['Client_a'],$_POST['Client_b'],$_POST['Client_c'],$_POST['Client_d'],$_POST['Client_e'],$_POST['Client_f'],$_POST['Client_g'],$_POST['Client_h'],$_POST['Client_i'],$_POST['Client_j'],$_POST['Client_k'],$_POST['Client_l'],$_POST['Client_m'],$_POST['Client_n'],$_POST['Client_o']);    
    }
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=CLIENTS";
    </script>
<?php
}

if (isset($_POST['delClient']))
{
//-----------------------------------------------
delClient($_POST['clientId']);
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=CLIENTS";
    </script>
<?php
}


if (isset($_POST['editClient']))
{
//-----------------------------------------------
    if(empty($_POST['Client_o']))
    {
        updClient($_POST['Client_a'],$_POST['Client_b'],$_POST['Client_c'],$_POST['Client_d'],$_POST['Client_e'],$_POST['Client_f'],$_POST['Client_g'],$_POST['Client_h'],$_POST['Client_j'],$_POST['Client_k'],$_POST['Client_l'],$_POST['Client_m'],$_POST['Client_n'],'0',$_POST['clientId']);
    }
    else
    {
        updClient($_POST['Client_a'],$_POST['Client_b'],$_POST['Client_c'],$_POST['Client_d'],$_POST['Client_e'],$_POST['Client_f'],$_POST['Client_g'],$_POST['Client_h'],$_POST['Client_j'],$_POST['Client_k'],$_POST['Client_l'],$_POST['Client_m'],$_POST['Client_n'],$_POST['Client_o'],$_POST['clientId']);    
    }
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=CLIENTS";
    </script>
<?php
}

if(isset($_POST['editStock']))
{
$a=$_POST['Estock_a'];
$b=$_POST['Estock_b'];
$c=$_POST['Estock_c'];
$d=$_POST['Estock_d'];
$e=$_POST['Estock_e'];
$f=$_POST['Estock_f'];
$g=$_POST['Estock_g'];
$h=$_POST['Estock_h'];
$i=$_POST['Estock_i'];
$z=$_POST['Estock_z'];

    editStock($a,$b,$c,$d,$e,$f,$g,$h,$i,$z);

echo '   <script>   
    window.location.href="admin.php?x=STOCK DETAILS";
    </script>';

}

if (isset($_POST['addGroups']))
{
//-----------------------------------------------



    if(!empty($_POST['groupa']))
    {
        $a=$_POST['groupa'];
        $b=$_POST['groupb'];
        $c=$_POST['groupc'];
        $d=$_POST['groupd'];
        $e=$_POST['groupe'];
        $f=$_POST['groupf'];
        $g='0';

         addgroup($a,$b,$c,$d,$e,$f,$g);
    
    }

//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=GROUP";
    </script>
<?php
}

if (isset($_POST['editGroups']))
{
//-----------------------------------------------


        $a=$_POST['egroupa'];
        $b=$_POST['egroupb'];
        $c=$_POST['egroupc'];
        $d=$_POST['egroupd'];
        $e=$_POST['egroupe'];
          $f=$_POST['egroupf'];
        $g=$_POST['egroupid'];

         editgroup($a,$b,$c,$d,$e,$f,$g)  ;


//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=GROUP";
    </script>
<?php
}











if (isset($_POST['add_busType']))
{



$busType = $_POST["busType"];

  $xQx_insert = "INSERT INTO businesstypes (busTypeName, isDeleted) VALUES ('$busType','0')";
  $query_insert=mysqli_query($conn,$xQx_insert);

?>
    <script>   
    window.location.href="admin.php?x=MAINTENANCE";
    </script>

    <?php

}



if (isset($_POST['del_busType']))
{



$busType = $_POST["delbusType"];

  $xQx_update = "UPDATE businesstypes SET isDeleted = '1' WHERE busTypeId = $busType";
  $query_update=mysqli_query($conn,$xQx_update);

?>
    <script>   
    window.location.href="admin.php?x=MAINTENANCE";
    </script>

    <?php

}

if (isset($_POST['del_catType']))
{



$catType = $_POST["delcatType"];

  $xQx_update = "UPDATE categories SET isDeleted = '1' WHERE catId = $catType";
  $query_update=mysqli_query($conn,$xQx_update);

?>
    <script>   
    window.location.href="admin.php?x=MAINTENANCE";
    </script>

    <?php

}




if (isset($_POST['add_catType']))
{



$catType = $_POST["catType"];

  $xQx_insert = "INSERT INTO categories (categoryName, isDeleted) VALUES ('$catType','0')";
  $query_insert=mysqli_query($conn,$xQx_insert);

?>
    <script>   
    window.location.href="admin.php?x=MAINTENANCE";
    </script>

    <?php

}












if (isset($_POST['updateSave']))

{
$_SESSION['stock_a'] = $a = $_POST["Estock_b"]; //tag
$_SESSION['stock_b'] = $b = "";
$_SESSION['stock_c'] = $c = $_POST["Estock_e"];
$_SESSION['stock_d'] = $d = $_POST["Estock_c"];
$_SESSION['stock_e'] = $e = $_POST["Estock_d"];
$_SESSION['stock_f'] = $f = $_POST["Estock_f"];
$_SESSION['stock_g'] = $g = $_POST["Estock_g"];
$_SESSION['stock_h'] = $h = $_POST["Estock_h"];
$_SESSION['stock_i'] = $i = $_POST["Estock_i"];

    ?>
  <script>   
    window.location.href="admin.php?x=STOCK DETAILS";
    </script>
    <?php
}


if (isset($_POST['copysave']))


{




$_SESSION['stock_a'] = $a = $_POST["stock_a"];
$_SESSION['stock_b'] = $b = "";
$_SESSION['stock_c'] = $c = $_POST["stock_c"];
$_SESSION['stock_d'] = $d = $_POST["stock_d"];
$_SESSION['stock_e'] = $e = $_POST["stock_e"];
$_SESSION['stock_f'] = $f = $_POST["stock_f"];
$_SESSION['stock_g'] = $g = $_POST["stock_g"];
$_SESSION['stock_h'] = $h = $_POST["stock_h"];
$_SESSION['stock_i'] = $i = $_POST["stock_i"];



            addstocks($a,$b,$c,$d,$e,$f,$g,$h,$i);

/*  $xQx_insert = "INSERT INTO assetstwo (code,serialName,supId,itmTypeId,assetName,brand,model,description,unitPrice,sellPrice,date_purchased,endofWarranty_date,delivery_date,quantity,isDeleted) VALUES ('$tagcode','$SerialNumber','$Supplier','$ItemGroup','$Item','$Brand','$Model','$description','$unit_price','$sell_price','$DateofPurchase','$EndofWarranty','$deliveryDate','$quantity','0')";
  $query_insert=mysqli_query($conn,$xQx_insert);    */    





    
//-----------------------------------------------
    ?>
  <script>   
    window.location.href="admin.php?x=STOCK DETAILS";
    </script> 
<?php
}




if (isset($_POST['addstocks']))
{
//-----------------------------------------------
 

  

 $a = $_POST["stock_a"];
 $b = $_POST["stock_b"];
 $c = $_POST["stock_c"];
 $d = $_POST["stock_d"];
 $e = $_POST["stock_e"];
 $f = $_POST["stock_f"];
 $g = $_POST["stock_g"];
 $h = $_POST["stock_h"];
 $i = $_POST["stock_i"];



            addstocks($a,$b,$c,$d,$e,$f,$g,$h,$i);

/*  $xQx_insert = "INSERT INTO assetstwo (code,serialName,supId,itmTypeId,assetName,brand,model,description,unitPrice,sellPrice,date_purchased,endofWarranty_date,delivery_date,quantity,isDeleted) VALUES ('$tagcode','$SerialNumber','$Supplier','$ItemGroup','$Item','$Brand','$Model','$description','$unit_price','$sell_price','$DateofPurchase','$EndofWarranty','$deliveryDate','$quantity','0')";
  $query_insert=mysqli_query($conn,$xQx_insert);    */    





    
//-----------------------------------------------
    ?>
  <script>   
    window.location.href="admin.php?x=STOCK DETAILS";
    </script> 
<?php
}




if (isset($_POST['delStock']))
{
//-----------------------------------------------
delStock($_POST['stockId']);
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=STOCK DETAILS";
    </script>
<?php 

}

if (isset($_POST['delInvoice']))
{
//-----------------------------------------------
delInvoice($_POST['InvoiceId']);
//-----------------------------------------------
    ?>
    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>
<?php
}


if (isset($_POST['addItems_invoice']))
{

    
        //use assetsID to and insert items_ordered
        $range=$_SESSION['SN'];
        $assetsId = $_SESSION["assetsId_invoice"];
        $sell=$_POST['Sell'];
      

        for ($i=0; $i <$range ; $i++) { 
        $SN="SN".$i;

        if(!empty($_POST[$SN]))
        {
            $SerN[]=$_POST[$SN];
        }
        else
        {

        }
        }
        date_default_timezone_set('Asia/manila');
        $D=date("Y-m-d");
                  
        date_default_timezone_set('Asia/manila');
        $T=date("g:i:s A");
        $unitPrice_ordered =$_SESSION['unitprice'];


        $invoiceId_submit = $_SESSION["invoiceId_submit"];
        for ($i=0; $i < count($SerN) ; $i++) { 


        $rowup=mysqli_fetch_array(mysqli_query($conn,'SELECT unitPrice,serialName FROM assetstwo  WHERE assetsId="'.$SerN[$i].'" '));

        $xQx_insert = "INSERT INTO items_ordered (assetsId,assetName,  unitPrice, sellPrice, invoiceId,isDeleted,dateadded) VALUES ('$SerN[$i]','$rowup[1]','$rowup[0]','$sell','$invoiceId_submit','0','$D')";
        $query_insert=mysqli_query($conn,$xQx_insert);

        }
        //   $xQx = "SELECT assetName,quantity FROM assetstwo WHERE assetsId = '$assetsId'";
        //   $query=mysqli_query($conn,$xQx);


        //             while($row = mysqli_fetch_array($query))

        //                 { 

        //                     $quantity = $row["quantity"];
        //                     $assetName = $row["assetName"];

        //                 }

        // $item_order = (int)$quantity - $itemrange_order;

        //  $unitPrice_ordered = $_SESSION["unitPrice"];
        // // $sellPrice_ordered = $_SESSION["sellPrice"];

        // $invoiceId_submit = $_SESSION["invoiceId_submit"];



        //   $xQx_insert = "INSERT INTO items_ordered (assetsId,  unitPrice, sellPrice, invoiceId,isDeleted) VALUES ('$assetsId','$unitPrice_ordered','$sell','$invoiceId_submit','0')";
        //   $query_insert=mysqli_query($conn,$xQx_insert);

        //   $xQx_update = "UPDATE assetstwo SET quantity = $item_order WHERE assetsId = $assetsId";
        //   $query_update=mysqli_query($conn,$xQx_update);





        }

?>

    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>

    <?php


$_SESSION['SN']='0';
$SerN[]="";
















?>