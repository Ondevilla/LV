<?php 
include('connect.config.php');


//-------------------------------- Supplier
function getSupplier()
{
  global $conn;
  $xQx = "SELECT supId,";
  $xQx .= "supName,";
  $xQx .= "contactPerson,";
  $xQx .= "telno,";
  $xQx .= "faxno,";
  $xQx .= "email,";
  $xQx .= "typeOfSup ";
  $xQx .= "FROM suppliers ";
  $xQx .= "WHERE isDeleted = 0 AND NOT supId = 0 ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}   
function getBusType()
{
  global $conn;
  $xQx = "SELECT busTypeId,";
  $xQx .= "busTypeName,";

  $xQx .= "FROM suppliers ";
  $xQx .= "WHERE isDeleted = 0";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}   

function getInvoice()
{
  global $conn;
  $xQx = "SELECT invoiceId,";
  $xQx .= "clientId,";
  $xQx .= "bustypeId,";
  $xQx .= "clientId ";
  $xQx .= "FROM invoices ";
  $xQx .= "WHERE isDeleted = 0";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}   



function getStocks()
{
  global $conn;
  $xQx = "SELECT assetsId,";
  $xQx .= "code,";
  $xQx .= "assetName,";
  $xQx .= "statId,";
  $xQx .= "unitPrice,";
  $xQx .= "sellPrice,";
  $xQx .= "supId, ";
  $xQx .= "brand, ";
  $xQx .= "model, ";
  $xQx .= "description,";
  $xQx .= "unitPrice, ";
  $xQx .= "sellPrice, ";
  $xQx .= "quantity, "; 
  $xQx .= "date_purchased, ";
  $xQx .= "endofWarranty_date, ";
  $xQx .= "delivery_date ";
  $xQx .= "FROM assetstwo ";
  $xQx .= "WHERE isDeleted = 0 AND quantity != 0";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}   

function getsupname($supId)
{
  global $conn;
  $xQx = "SELECT supName";
  $xQx .= "FROM suppliers ";
  $xQx .= "WHERE supId='$supId'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}  

function getGroup()
{
  global $conn;
  $xQx = "SELECT * ";
  $xQx .= "FROM groups ";
  $xQx .= "WHERE isDeleted = 0";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}   


function addSupplier($a,$b,$c,$d,$e,$f,$g,$h,$i,$j)
{
    global $conn;
    $xQx = "INSERT INTO suppliers(";
    $xQx .= "supName,";
    $xQx .= "contactPerson,";
    $xQx .= "busTypeId,";
    $xQx .= "address,";
    $xQx .= "telno,";
    $xQx .= "faxno,";
    $xQx .= "email,";
    $xQx .= "remarks,";
    $xQx .= "typeOfSup,";
    $xQx .= "isActive) ";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d','$e','$f','$g','$h','$i','$j' ) ";
    $query=mysqli_query($conn,$xQx);
    return  $query;
}


function addinvoice($a,$b,$c,$d,$e,$f,$g)
{
    global $conn;
    $xQx = "INSERT INTO invoices(";
    $xQx .= "invoiceId,";
    $xQx .= "clientId,";
    $xQx .= "busTypeId,";
    $xQx .= "date_created,";
    $xQx .= "due_date,";
    $xQx .= "remarks,";
    $xQx .= "isDeleted) ";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d','$e','$f','$g') ";
    $query=mysqli_query($conn,$xQx);
    return  $query;
}


function getstocktable()
{
   global $conn;
 $xQx  = " SELECT g.`groupName`,COUNT(itmTypeId),g.critical,unitPrice FROM assetstwo AS a LEFT JOIN groups AS g  ON a.itmTypeId=g.groupid WHERE a.`status`='available' GROUP BY  itmTypeId";

 $query=mysqli_query($conn,$xQx);
  return  $query;

}

 
function getsoldstocktable()
{

 global $conn;
      



                  $xQx  = "  SELECT g.`groupName`,io.`invoiceId`,r.`clientName`,a2.`serialName`,a2.`unitPrice`,io.`sellPrice` FROM assetstwo a2 INNER JOIN items_ordered io ON a2.`serialName`=io.`assetName` INNER JOIN groups g ON g.`groupid` =a2.`itmTypeId` INNER JOIN reportsclientorder r ON r.`invoiceId`=io.`invoiceId` WHERE a2.`status`='pullout'  AND io.`isDeleted`='0'";

                               $query=mysqli_query($conn,$xQx);

                                 while($row=mysqli_fetch_array($query))
                                          {
                                            echo" 
                                            <tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>
                                            <td>$row[4]</td>
                                                 <td>$row[5]</td>

                              </tr>

                              ";
  
                           }


}
function getpulloutstocktable()
{

 global $conn;
      



                  $xQx  = "   
 SELECT g.`groupName`,s.`supName`,a2.`serialName`,a2.`unitPrice`,a2.`Defectiveissue` FROM assetstwo a2 INNER JOIN groups g ON a2.`itmTypeId`=g.`groupid` INNER JOIN  suppliers s ON s.`supId`=a2.`supId` WHERE `status`='defective'";

                               $query=mysqli_query($conn,$xQx);

                                 while($row=mysqli_fetch_array($query))
                                          {
                                            echo" 
                                            <tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td>
                                            <td>$row[3]</td>
                                            <td>$row[4]</td>
                                                

                              </tr>

                              ";
  
                           }


}
function getonstocktable()
{

 global $conn;
      

 $query1=mysqli_query($conn,"SELECT `groupid` FROM groups ");

  while($rowquery1=mysqli_fetch_array($query1))
            {
 $SeeModal="SeeModal".$rowquery1[0];

                  $xQx  = " SELECT g.`groupName`,COUNT(a.`itmTypeId`),g.`critical` FROM groups AS g LEFT JOIN assetstwo AS a  ON g.`groupid`=a.`itmTypeId` WHERE a.`status`='available' AND g.`groupid`='".$rowquery1[0]."'";

                               $query=mysqli_query($conn,$xQx);

                                 while($row=mysqli_fetch_array($query))
                                          {
                                            echo" 
                                            <tr>
                                            <td>$row[0]</td>
                                            <td>$row[1]</td>
                                            <td>$row[2]</td><td>
                                             <button type='button' class='btn btn-block btn-info btn-flat' data-toggle='modal' data-target='#".$SeeModal."'><i class='fa fa-eye'></i></button>

                                            ";

echo "   
  <div id='".$SeeModal."' class='modal fade'>
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'>
          <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
          <h4 class='modal-title'>$row[0]</h4>
        </div>
        <div class='modal-body'>
              <div class='row' style='padding:30px;'>
              ";
  
       $xQx2  = "   SELECT serialName,unitPrice FROM assetstwo WHERE itmTypeId='".$rowquery1[0]."' and status='available' GROUP BY unitPrice ";

  echo ' <div class="row">';
                                                                echo "<div class='col-md-6'> SERIAL NAME </div> ";
                                                                echo "<div class='col-md-6'> UNIT PRICE </div> ";
                                                                echo ' </div>';

                                                          $query2=mysqli_query($conn,$xQx2);
                                                      
                                                              while($rowquery2=mysqli_fetch_array($query2))
                                                            {
                                                                  echo ' <div class="row">';
                                                                echo "<div class='col-md-6'>   ".$rowquery2[0]." </div> ";
                                                                echo "<div class='col-md-6'>   ".$rowquery2[1]." </div> ";
                                                                echo ' </div>';
                                                            }     
                                                                 
              echo "      
              
              </div>
        </div>
        <div class='modal-footer'>
        <button type='button' class='btn btn-primary' data-dismiss='modal'>OK</button>
                        
        </form>
        </div>
      </div>
    </div>
  </div>";

                                                      

                                        echo "
                                       </td>
                              </tr>

                              ";
  
                           }

            }

}

function getstocktableindividual()
{
   global $conn;
 $xQx  = "SELECT assetsId,serialName,`code`,(SELECT ig.groupName FROM groups AS ig WHERE ig.groupid=.a.itmTypeId),unitPrice,(SELECT b.supName FROM suppliers AS b WHERE b.supId = a.supId) ,date_purchased,endofWarranty_date,delivery_date,remarks,sellprice FROM assetstwo AS a WHERE a.status='available' ";

 $query=mysqli_query($conn,$xQx);
  return  $query;

}

function addstocks($a,$b,$c,$d,$e,$f,$g,$h,$i)
{
    global $conn;
    $xQx = "INSERT INTO assetstwo(";
    $xQx .= "code,";
    $xQx .= "serialName,";
    $xQx .= "supId,";
    $xQx .= "itmTypeId,";
    $xQx .= "unitPrice,";
    $xQx .= "date_purchased,";
    $xQx .= "endofWarranty_date,";
    $xQx .= "delivery_date,";
    $xQx .= "remarks )";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d','$e','$f','$g','$h','$i')";
    $query=mysqli_query($conn,$xQx);
    return  $query;
}

function  addgroup($a,$b,$c,$d,$e,$f,$g)  
{
    global $conn;
    $xQx = "INSERT INTO groups(";
    $xQx .= "groupName,";
    $xQx .= "critical,";
    $xQx .= "groupmodel,";
    $xQx .= "groupbrand,";
    $xQx .= "sellprice,";
    $xQx .= "groupspec,";
 
    $xQx .= "isDeleted) ";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d','$e','$f','$g') ";
    $query=mysqli_query($conn,$xQx);
    return  $query;
}

function  editgroup($a,$b,$c,$d,$e,$f,$g)  
{
    global $conn;
    $xQx = "UPDATE groups SET ";
    $xQx .= "groupName = '$a', ";
    $xQx .= "groupmodel = '$b', ";
    $xQx .= "groupbrand = '$c', ";
    $xQx .= "groupspec = '$d', ";
    $xQx .= "`critical` = '$e', ";
    $xQx .= "`sellprice` = '$f' ";

    $xQx .=" WHERE ";
    $xQx .=" groupid = '$g' ";


        $xQx = "UPDATE items_ordered a ";
        $xQx = " INNER JOIN assetstwo b ON ";       
         $xQx = " a.assetsId = b.assetsId ";
         $xQx = " INNER JOIN groups c ON  ";
        $xQx = " c.groupid = b.itmTypeId ";


     $xQx = " SET a.sellprice='$f' ";
    $xQx = "  WHERE c.groupid='$g' AND a.isDeleted='0' ";
    

 
 
    $query=mysqli_query($conn,$xQx);
    return  $query;
}



function editStock($a,$b,$c,$d,$e,$f,$g,$h,$i,$z)
{
  global $conn;
  $xQx = "UPDATE assetstwo ";
  $xQx .= "SET serialName = '$a', ";
  $xQx .= "`code` = '$b', ";
  $xQx .= "itmTypeId = '$c', ";
  $xQx .= "unitPrice = '$d', ";
  $xQx .= "supId = '$e', ";
  $xQx .= "date_purchased = '$f', ";
  $xQx .= "endofWarranty_date = '$g', ";
  $xQx .= "delivery_date = '$h', ";
  $xQx .= "remarks = '$i' ";
  $xQx .=  "WHERE assetsId='$z' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}






function amoreStock($a,$b,$c,$d,$e,$f,$g,$h,$i)
{

  global $conn;
    $xQx = "INSERT INTO assetstwo(";
    $xQx .= "serialName,"; 
    $xQx .= "code,";
    $xQx .= "itmTypeId,";
    $xQx .= "unitPrice,";
    $xQx .= "supId,";
    $xQx .= "date_purchased,";
    $xQx .= "endofWarranty_date,";
    $xQx .= "delivery_date,";
    $xQx .= "remarks )";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d','$e','$f','$g','$h','$i')";
    $query=mysqli_query($conn,$xQx);
    return  $query;

}



function delStock($a,$b)
{
  global $conn;
  $xQx = "UPDATE assetstwo ";
  $xQx .= "SET status = 'defective',Defectiveissue='$b' ";
  $xQx .=  "WHERE assetsId='$a' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}





function delSupplier($a)
{
  global $conn;
  $xQx = "UPDATE suppliers ";
  $xQx .= "SET isDeleted = 1 ";
  $xQx .=  "WHERE supId='$a' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}
function delReport($a)
{
  global $conn;
  $xQx = "UPDATE reportsclientorder ";
  $xQx .= "SET isDeleted = 1 ";
  $xQx .=  "WHERE reportOrder_id='$a' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function getEdit_Supplier($a)
{
  global $conn;
  $xQx = "SELECT supName,";
  $xQx .= "contactPerson,";
  $xQx .= "telno,";
  $xQx .= "faxno,";
  $xQx .= "address,";
  $xQx .= "email,";
  $xQx .= "typeOfSup, ";
  $xQx .= "remarks, ";
  $xQx .= "isActive, ";
  $xQx .= "busTypeId, ";
  $xQx .= "approved_by, ";
  $xQx .= "date_approved, ";
  $xQx .= "supId ";
  $xQx .= "FROM suppliers ";
  $xQx .= "WHERE supId='$a' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;

}
function updSupplier($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k)
{
  global $conn;
  $xQx = "UPDATE suppliers ";
  $xQx .= "SET supName='$a', ";
  $xQx .= "contactPerson='$b', ";
  $xQx .= "busTypeId='$c', ";
  $xQx .= "address='$d', ";
  $xQx .= "telno='$e', ";
  $xQx .= "faxno='$f', ";
  $xQx .= "email='$g', ";
  $xQx .= "remarks='$h', ";
  $xQx .= "typeOfSup='$i', ";
  $xQx .= "isActive='$j' ";
  $xQx .= "WHERE supId = '$k'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}


function getallSup_BusType()
{
  global $conn;
  $xQx = "SELECT busTypeId,busTypeName ";
  $xQx .=  "FROM businesstypes WHERE NOT busTypeId = 0 AND isDeleted = 0";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function getSup_BusType($a)
{
  global $conn;
  $xQx = "SELECT busTypeId,busTypeName ";
  $xQx .=  "FROM businesstypes  ";
  $xQx .=  "WHERE busTypeId = '$a' ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

//-------------------------------- Client

function getClient()
{
  global $conn;
  $xQx = "SELECT clientId,";
  $xQx .=  "clientName,";
  $xQx .=  "contactPerson,";
  $xQx .=  "telno,";
  $xQx .=  "mobileno,";
  $xQx .=  "faxno,";
  $xQx .=  "email ";
  $xQx .=  "FROM clients ";
  $xQx .=  "WHERE isDeleted = 0 ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function delClient($a)
{
  global $conn;
  $xQx = "UPDATE clients ";
  $xQx .=  "SET isDeleted = 1 ";
  $xQx .=  "WHERE clientId='$a'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}


function delInvoice($a)
{
  global $conn;



  $xQx = "UPDATE invoices ";
  $xQx .=  "SET isDeleted = 1 ";
  $xQx .=  "WHERE invoiceId='$a'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function toavailableinvo($a)
{
  global $conn;

  $que=mysqli_query($conn,"SELECT i.`assetName` FROM items_ordered i LEFT JOIN invoices a ON a.`invoiceId`=i.`invoiceId` WHERE a.`invoiceId`='".$a."' AND a.`isDeleted`='0'");
  while ($row=mysqli_fetch_array($que)) {
        $xQx = "UPDATE assetstwo ";
        $xQx .=  "SET status = 'available' ";
        $xQx .=  "WHERE serialName='".$row[0]."'";
        $query=mysqli_query($conn,$xQx);

  }
  
 
}

function toavailableinvospecific($a)
{
  global $conn;



        $xQx = "UPDATE assetstwo ";
        $xQx .=  "SET status = 'available' ";
        $xQx .=  "WHERE serialName='".$a."'";
        $query=mysqli_query($conn,$xQx);


  
 
}

function todeleteitemorderspecifi($a,$b)
{
  global $conn;

  $xQx = "UPDATE items_ordered ";
  $xQx .=  "SET isDeleted = '1' ";
  $xQx .=  "WHERE invoiceId='$a' and assetName='$b'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
 
}


function todeleteitemorder($a)
{
  global $conn;

  $xQx = "UPDATE items_ordered ";
  $xQx .=  "SET isDeleted = '1' ";
  $xQx .=  "WHERE invoiceId='$a'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
 
}


 



function delgenInvoice($a)
{
  global $conn;
  $xQx = "UPDATE invoices ";
  $xQx .=  "SET isDeleted = 1 ";
  $xQx .=  "WHERE invoiceId='$a'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function delpaidInvoice($a)
{
  global $conn;
  $xQx = "UPDATE invoices ";
  $xQx .=  "SET isDeleted = 1 ";
  $xQx .=  "WHERE invoiceId='$a'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}


function addClient($a,$b,$c,$d,$e,$f,$g,$h,$i,$j,$k,$l,$m,$n,$o)
{
  global $conn;
  $xQx = "INSERT INTO clients(";
  $xQx .= "clientName, ";
  $xQx .= "busTypeId, ";
  $xQx .= "contactPerson, ";
  $xQx .= "address, ";
  $xQx .= "telno, ";
  $xQx .= "faxno, ";
  $xQx .= "mobileno, ";
  $xQx .= "email, ";
  $xQx .= "dateCreated, ";
  $xQx .= "remarks, ";
  $xQx .= "tin, ";
  $xQx .= "osca_pwd_no, ";
  $xQx .= "sc_tin_no, ";
  $xQx .= "tax_status, ";
  $xQx .= "isActive) ";
  $xQx .= " VALUES('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j','$k','$l','$m','$n','$o') ";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}



function updClient($a,$b,$c,$d,$e,$f,$g,$h,$j,$k,$l,$m,$n,$o,$p)
{
  global $conn;
  $xQx = "UPDATE clients SET ";
  $xQx .= "clientName='$a', ";
  $xQx .= "busTypeId='$b', ";
  $xQx .= "contactPerson='$c', ";
  $xQx .= "address='$d', ";
  $xQx .= "telno='$e', ";
  $xQx .= "faxno='$f', ";
  $xQx .= "mobileno='$g', ";
  $xQx .= "email='$h', ";
/*   $xQx .= "dateCreated='$i', "; */
  $xQx .= "remarks='$j', ";
  $xQx .= "tin='$k', ";
  $xQx .= "osca_pwd_no='$l', ";
  $xQx .= "sc_tin_no='$m', ";
  $xQx .= "tax_status='$n', ";
  $xQx .= "isActive='$o' ";
  $xQx .= "WHERE clientId ='$p'";
  $query=mysqli_query($conn,$xQx);
  return  $query;
}

function getEdit_Clients($a)
{
  global $conn;
  $xQx = "SELECT clientId,";
  $xQx .= "clientName,";
  $xQx .= "busTypeId,";
  $xQx .= "contactPerson,";
  $xQx .= "address,";
  $xQx .= "telno,";
  $xQx .= "faxno,";
  $xQx .= "mobileno,";
  $xQx .= "email,";
  $xQx .= "dateCreated,";
  $xQx .= "remarks,";
  $xQx .= "tin,";
  $xQx .= "osca_pwd_no,";
  $xQx .= "sc_tin_no,";
  $xQx .= "tax_status,";
  $xQx .= "isActive ";
  $xQx .= "FROM clients  ";
  $xQx .= "WHERE clientId = '$a'";
  $query=mysqli_query($conn,$xQx);


  return  $query;

}

function getItems()
{
  global $conn;
  $xQx = "SELECT g.`groupid`, ";
  $xQx .= "g.`groupName` ";
  $xQx .= "FROM groups g ";
  $xQx .= "INNER JOIN assetstwo a2 ON a2.`itmTypeId`=g.`groupid`  ";
  $xQx .= "WHERE  g.isDeleted = '0' and a2.`status`='available' GROUP BY g.`groupid` ";





  $query=mysqli_query($conn,$xQx);

  return  $query;

}

function getItem_quantity()
{
  global $conn;
  $xQx = "SELECT assetsId,";
  $xQx .= "assetName ";
  $xQx .= "FROM assetstwo ";
  $xQx .= "WHERE isDeleted = '0'";
  $query=mysqli_query($conn,$xQx);

  return  $query;

}


function get_user()
{
  global $conn;
  $xQx = "SELECT * ";
  $xQx .= "FROM useraccount ";
  $xQx .= "ORDER BY isActive DESC ";
  $query=mysqli_query($conn,$xQx);

  return  $query;

}


function addAccount($a,$b,$c,$d)
{
    global $conn;
    $xQx = "INSERT INTO useraccount(";
    $xQx .= "user_name,";
    $xQx .= "user_password,";
    $xQx .= "accessright,";
    $xQx .= "isActive) ";
    $xQx .=" VALUES (";
    $xQx .=" '$a','$b','$c','$d') ";
    $query=mysqli_query($conn,$xQx);
    return  $query;
}

function editAccount($a,$b,$c,$d)
{
    global $conn;
    $xQx = "UPDATE  useraccount SET ";
    $xQx .= "user_name='$a',";
    $xQx .= "user_password='$b',";
    $xQx .= "accessright='$c'";
   $xQx .=  "WHERE user_id='$d' ";

    $query=mysqli_query($conn,$xQx);
    return  $query;
}

function geteditAccount($a)
{
    global $conn;
  $xQx = "SELECT * ";
  $xQx .= "FROM useraccount ";
  $xQx .= "WHERE user_id = '$a'";
  $query=mysqli_query($conn,$xQx);

  return  $query;
}

function delAccount($a)
{
     global $conn;
    $xQx = "UPDATE  useraccount SET ";
    $xQx .= "isActive='0' ";
   $xQx .=  "WHERE user_id='$a' ";

    $query=mysqli_query($conn,$xQx);
    return  $query;
}
function resAccount($a)
{
     global $conn;
    $xQx = "UPDATE  useraccount SET ";
    $xQx .= "isActive='1' ";
   $xQx .=  "WHERE user_id='$a' ";

    $query=mysqli_query($conn,$xQx);
    return  $query;
}



function invo1()
{
     global $conn;
  $xQx = "SELECT * FROM invoices WHERE Status ='0'  AND isDeleted = '0' ";

    $query=mysqli_query($conn,$xQx);
    return  $query;
}

  


?>