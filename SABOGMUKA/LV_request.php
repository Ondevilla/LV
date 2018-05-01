<?php
include('LV_queries.php'); 
include('connect.config.php');
include('support/function.php');
session_start();

$a=$_POST['Estock_a'];
$b=$_POST['Estock_b'];
$c=$_POST['Estock_c'];
$d=$_POST['Estock_d'];
$e=$_POST['Estock_e'];
$f=$_POST['Estock_f'];
$g=$_POST['Estock_g'];
$h=$_POST['Estock_h'];
$i=$_POST['Estock_i'];


    amoreStock($a,$b,$c,$d,$e,$f,$g,$h,$i);

    ?>
