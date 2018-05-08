<?php  
 ob_start();
include("connect.config.php");
require('fpdf17/fpdf.php');
session_start();




$invoiceId = $_POST["print_or"];

  $xQx_clientId_id = "SELECT * FROM invoices WHERE invoiceId = '$invoiceId'";
  $query_clientId_id=mysqli_query($conn,$xQx_clientId_id);         


                      while($row=mysqli_fetch_array($query_clientId_id))

{

          $invoiceId = $row["invoiceId"];
          $get_clientname = $row["clientName"];
          $get_id = $row["clientId"];
}


  $xQx_client_info = "SELECT * FROM clients WHERE clientId = '$get_id'";
  $query_client_info=mysqli_query($conn,$xQx_client_info);         


                      while($row=mysqli_fetch_array($query_client_info))

{

    $client_address = $row["address"];
    $get_bustypeId = $row["busTypeId"];
    $get_tin = $row["tin"];
    $get_pwd = $row["osca_pwd_no"];

}

  $xQx_bustype_info = "SELECT * FROM businesstypes WHERE busTypeId = '$get_bustypeId'";
  $query_bustype_info=mysqli_query($conn,$xQx_bustype_info);         


                      while($row=mysqli_fetch_array($query_bustype_info))

{

  $bustype_name = $row["busTypeName"];
}
  $date = date('Y-m-d');
//create pdf object
$pdf = new FPDF('P','mm','A4');
//add new page
$pdf->AddPage();
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','',8);

//Cell(width , height , text , border , end line , [align] )
// Insert a logo in the top-left corner at 300 dpi
$pdf->Image('fpdf17/cavitech.png',50,3,-200);
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line
$pdf->Cell(59 ,5,'',0,1);//end of line

$pdf->Cell(0 ,3,'Block 3A LOT 4 DIAMOND ST., WESTRIDGE RESIDENCES, BRGY. SALAWAG, DASMARINAS CITY, CAVITE 4114',0,1,'C');

$pdf->Cell(0 ,3,'TEl:NO (02)735-7511/(02)871-4105/(02)985-8599/(02)806-8469/1F(046)450-5942',0,1,'C');

$pdf->Cell(0 ,3,'VAT REG. TIN:008-934-715-000/www.cavitech.ph',0,1,'C');
$pdf->Cell(59 ,5,'',0,1);//end of line
//set font to arial, bold, 14pt
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130 ,5,'CHARGE INVOICE',0,0);
$pdf->Cell(12 ,5,'NO',0,0);//end of line
$pdf->Cell(25 ,5,$invoiceId,0,1);//end of line


//set font to arial, regular, 12pt
$pdf->SetFont('Arial','',10);
$pdf->Cell(50 ,5,'',0,1);
$pdf->Cell(25 ,5,'SOLD TO    ',0,0);
$pdf->Cell(100 ,5,$get_clientname,0,0);
$pdf->Cell(15 ,5,'DATE ',0,0);
$pdf->Cell(54 ,5,$date,0,1);//end of line
$pdf->Cell(25 ,5,'ADDRESS  ',0,0);
$pdf->Cell(100 ,5,$client_address,0,1);
$pdf->Cell(25 ,5,'TERMS     ',0,0);
$pdf->Cell(100 ,5,'__ CASH __ CHECK',0,0);//end of line
$pdf->Cell(25 ,5,'P.O. NO',0,0);
$pdf->Cell(34 ,5,'1000',0,1);//end of line
$pdf->Cell(50 ,5,'BUSINESS NAME STYLE  ',0,0);
$pdf->Cell(75 ,5,$bustype_name,0,0);
$pdf->Cell(25 ,5,'TIN ',0,0);
$pdf->Cell(54 ,5,$get_tin,0,1);//end of line
$pdf->Cell(50 ,5,'OSCA/PWD ID NO  ',0,0);
$pdf->Cell(25 ,5,$get_pwd,0,0);
$pdf->Cell(50 ,5,'CARDHOLDERS SIGNATURE ',0,0);
$pdf->Cell(54 ,5,'________________________________',0,1);//end of line




  $xQx_clientId = "SELECT * FROM invoices WHERE invoiceId = '$invoiceId'";
  $query_clientId=mysqli_query($conn,$xQx_clientId);         


                      while($row=mysqli_fetch_array($query_clientId))

{

          $clientId = $row["clientId"];
}



  $xQx_clientInfo = "SELECT * FROM clients WHERE clientId = '$clientId'";
  $query_clientInfo=mysqli_query($conn,$xQx_clientInfo);         


                      while($row=mysqli_fetch_array($query_clientInfo))

{
            $clientName = $row["clientName"];
            $contactPerson = $row["contactPerson"];
            $address = $row["address"];
            $email = $row["email"]; 
            $tax = $row["tax_status"]; 

        





          if($tax=="Vatable")

          {

            $tax_value = 00.12;


          }
          else

          {

            $tax_value = 0.00;
          

          }


}





/*$pdf->Cell(130 ,5,'Phone [+12345678]',0,0);
$pdf->Cell(25 ,5,'Invoice #',0,0);
$pdf->Cell(34 ,5,$invoiceId,0,1);//end of line

$pdf->Cell(130 ,5,'Fax [+12345678]',0,0);
$pdf->Cell(25 ,5,'Customer ID',0,0);
$pdf->Cell(34 ,5,$clientId,0,1);//end of line*/

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line

//billing address
/*$pdf->Cell(100 ,5,'Bill to',0,1);//end of line

//add dummy cell at beginning of each line for indentation
$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$clientName,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$contactPerson,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$address,0,1);

$pdf->Cell(10 ,5,'',0,0);
$pdf->Cell(90 ,5,$email,0,1);

//make a dummy empty cell as a vertical spacer
$pdf->Cell(189 ,10,'',0,1);//end of line*/

//invoice contents
$pdf->SetFont('Arial','B',12);

$pdf->Cell(100 ,5,'Product',1,0);

$pdf->Cell(55 ,5,'Serial #',1,0);
$pdf->Cell(34 ,5,'Amount',1,1);//end of line

$pdf->SetFont('Arial','',12);

//Numbers are right-aligned so we give 'R' after new line parameter

$sp="";
  $xQx_items = "SELECT g.`groupName`,a2.`serialName`,g.`sellPrice` FROM assetstwo a2 INNER JOIN groups g ON g.`groupid`=a2.`itmTypeId` INNER JOIN items_ordered id ON id.`assetName`=a2.`serialName` INNER JOIN invoices i ON i.`invoiceId` = id.`invoiceId` WHERE i.`invoiceId`='".$invoiceId."'    AND id.`isDeleted`='0' GROUP BY a2.`serialName` ";
  $query_items=mysqli_query($conn,$xQx_items);         


                      while($row=mysqli_fetch_array($query_items))

{

  
/*$sp[].=$row["sellPrice"];*/
$pdf->Cell(100 ,5,$row["groupName"],1,0);
$pdf->Cell(55 ,5,$row["serialName"],1,0);

$pdf->Cell(34 ,5,number_format($row["sellPrice"]),1,1,'R');//end of line

}

$pdf->Cell(189 ,10,'',0,1);


/* $tot=array_sum($sp);*/

/* $toxy =$tot* $tax_value;
 $totx =  $tot ;

//summary
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Subtotal',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(30 ,5,number_format($tot),1,1,'R');//end of line



$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Tax Rate',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(30 ,5,number_format($toxy),1,1,'R');//end of line

$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Total Due',0,0);
$pdf->Cell(4 ,5,'P',1,0);
$pdf->Cell(30 ,5,number_format($totx),1,1,'R');//end of line*/
//output the result
$pdf->Output();
  ob_end_flush(); 
?>