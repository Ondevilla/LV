

<?php

session_start();


$conn=mysqli_connect('localhost:3307','root','ondevilla','lightvent')or die("Couldn't connect to MySQL:<br>" . mysqli_error() . "<br>" . mysqli_errno());

$sql = $_SESSION['exportsql'];



date_default_timezone_set('Asia/manila');
$D=date("Y-m-d");
          
date_default_timezone_set('Asia/manila');
$T=date("g:i:s A");

  // Original PHP code by Chirp Internet: www.chirp.com.au
  // Please acknowledge use of this code by including this header.


$filename = "LightVend $D $T";         

  $file_ending = "xls";
//header info for browser
header("Content-Type: application/xls");    
header("Content-Disposition: attachment; filename=$filename.xls");  
header("Pragma: no-cache"); 
header("Expires: 0");
   

  


  //iterate on results row and create new index array of data





  $queryRecords = mysqli_query($conn, $sql ) or die("error to fetch data");


 // $fieldcount=mysqli_num_fields($queryRecords);


echo '<table width="100%" border="1">' ;
//end of printing column names  
//start while loop to get data
echo '<tr>';
// for ($i=0; $i <=($fieldcount-1); $i++) { 
//   echo '<th style="width:2%">'.   $row[$i].'</td>';
// }
echo " <th style='width:100%;background-color:#3c8dbc;color:white;' colspan='6'><br><center>LIGHTVEND</center><br></th>";

echo '</tr>';
   
echo '<tr>';
// for ($i=0; $i <=($fieldcount-1); $i++) { 
//   echo '<th style="width:2%">'.   $row[$i].'</td>';
// }
echo "        <th style='width:150px'>INVOICE ID</th>
              <th style='width:400px'>CLIENT NAME</th>
              <th style='width:150px'>DATE</th>
              <th style='width:150px'>DUE DATE</th> 
              <th style='width:150px'>HANDLED BY</th>
              <th style='width:150px'>SELL PRICE</th>";

echo '</tr>';
      
           

$sp='';
           
      $condition='0';

    while($row = mysqli_fetch_array($queryRecords))
    {

echo '<tr>';
// for ($i=0; $i <=($fieldcount-1); $i++) { 
//   echo '<td >'.   $row[$i].'</td>';
// }
echo "        <td style='width:150px'><center>$row[0]</center></td>
              <td style='width:400px'>$row[1]</td>
               <td style='width:150px'>$row[2]</td>
              <td style='width:150px'>$row[3]</td> 
     
              <td style='width:150px'><center>$row[4]</center></td>
              <td style='width:150px'>".number_format($row[5])."</td>";
echo '</tr>';
      $sp[].=$row[5];
           
      $condition='1';
           
     

    } 
if($condition=='1')
{
$total=array_sum($sp);


echo"<tr><th style='width:100%;text-align:right;' colspan='6'><br></th></tr>";
echo '<tr>';
// for ($i=0; $i <=($fieldcount-1); $i++) { 
//   echo '<th style="width:2%">'.   $row[$i].'</td>';
// }

echo " <th style='width:100%;text-align:right;padding-right:50px;' colspan='6'><br> GRAND TOTAL : ".number_format($total)." PHP  <br><br></th>";

echo '</tr>';
}
echo "</table>"  ;



?>
<script type="text/javascript">window.location.href='admin.php?x=RECEIVABLES';</script>
