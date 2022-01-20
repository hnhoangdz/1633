<!-- this file is to update models of products -->

<?php
require_once "header.php";

$id = $_POST['id'];
if (isset($_POST['update'])) {
$name = $_POST['name'];
$sql = "UPDATE models SET models_name = '$name' WHERE models_id = '$id'";
$run = execute_query($sql);
if ($run) { ?>
   <script type="text/javascript">
		alert ("Update models successfully !");
		window.location.href = "manage_models.php";
   </script>
<?php 
} else { ?>
  <script type="text/javascript">
		alert ("Update class failed !");
		window.location.href = "manage_models.php";
  </script>
<?php } } ?>

<form style="color: whitesmoke;" class="frm123" action="" method="POST">
	<fieldset>
	<legend>Update Model</legend>
	Model name:
	<?php
	$qry = "SELECT * FROM models WHERE models_id = '$id'";
	$result = execute_query($qry);
	$cls = mysqli_fetch_array($result);
	?>
	<input type="hidden" name="id" value="<?= $cls[0] ?>">
	<input type="text" name="name" value="<?= $cls[1] ?>" size="30"> <br><br>
	<input type="submit" name="update" value="Update">
    </fieldset>
</form>
