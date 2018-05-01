

<?php session_start();
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<form method="get" action="testcart.php">

<div id="checkboxes">
<input type="checkbox" name="prod[]" value="Option 1" />Option 1
<input type="checkbox" name="prod[]" value="Option 2" />Option 2
<input type="checkbox" name="prod[]" value="Option 3" />Option 3
<input type="checkbox" name="prod[]" value="Option 4" />Option 4
<input type="submit" name="submit">
</form>
</div>
<div id="output"></div>
<div id="output1"></div>
<?php 
if (isset($_GET['prod']) ){
			if(count($_GET['prod'])>=1)
			{


			echo count($_GET['prod']);
			echo '<br>';



			for ($i=0; $i < count($_GET['prod']) ; $i++) { 
		/*	echo ($_GET['prod'][$i]);*/

			echo $_SESSION['prod'].=$_GET['prod'][$i];


			}

			}
			else
			{
				$_SESSION['prod']=$_GET['prod']="";
			}


}



?>


<script type="text/javascript">

var updateOutput = function() {
 $("#output").text($("#checkboxes input:checked").map(function () {
   return $(this).val();
 }).get().join());
};
$("#checkboxes input").click(updateOutput);
updateOutput();
</script>



