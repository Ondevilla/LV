<?php 

function con($a,$b,$c,$d)
{
$h='$a';
$u='$b';
$p='$c';
$d='$d';
$con=mysqli_connect($h, $u, $p, $d) or die (mysqli_error());
global $con;
}

function querySFW($a,$b,$c)
{
  global $con;
  $xQx = "SELECT $a "
  $xQx .= "FROM $b ";
  $xQx .= "WHERE $c ";
  $query=mysqli_query($con,$xQx);
  return  $query;
}




?>