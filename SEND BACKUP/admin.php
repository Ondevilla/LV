<?php
session_start();
date_default_timezone_set('Asia/manila');




if(empty($_SESSION["u_id"]))
{
	session_destroy();
?>


<script type="text/javascript">
	window.location.href="admin_login.php";
</script>

<?php
}

include('LV_queries.php'); 
include('LV_forms.php');
include('LV_tables.php');

include('support/function.php');

include('admin_head.php');
include('admin_main_header.php');
include('admin_sidebar.php');
include('admin_content.php');
include('admin_control_sidebar.php');


?>
 