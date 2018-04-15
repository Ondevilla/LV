<?PHP 

if(!isset($_POST['id']))
{
	
?>
    <script>   
    window.location.href="admin.php?x=NEW%20INVOICE";
    </script>
<?PHP
}
else
{
$sample = $_POST['id'];
$_SESSION["invoiceId_submit"] = $sample;
}


frm_add_itemsinvo();

?>