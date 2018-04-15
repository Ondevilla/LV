<?php


if( $_SESSION["access"]!=1)
{
$sidebar_label=array("SUPPLIERS","STOCKS","GROUP","INVOICES","CLIENTS","REPORTS","SAMPLE","PAYOUT");
$sidebar_icon=array("fa fa-dropbox","fa fa-truck","fa fa-object-group","fa fa-shopping-cart","fa fa-group","fa fa-pie-chart","","");
$sub_sidebar_label=array("STOCK VIEW","STOCK DETAILS");
$sub_sidebar_label1=array("NEW INVOICE","GENERATED INVOICE","PAID INVOICE");
}
else
{
	$sidebar_label=array("MAINTENANCE","SUPPLIERS","STOCKS","GROUP","INVOICES","CLIENTS","REPORTS","SAMPLE","PAYOUT","ACCOUNTS");
$sidebar_icon=array("fa fa-gear","fa fa-dropbox","fa fa-truck","fa fa-object-group","fa fa-shopping-cart","fa fa-group","fa fa-pie-chart","","","fa fa-user");
$sub_sidebar_label=array("STOCK VIEW","STOCK DETAILS");
$sub_sidebar_label1=array("NEW INVOICE","GENERATED INVOICE","PAID INVOICE");
}
?>