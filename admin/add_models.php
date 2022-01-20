<?php
require_once "header.php";
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO models (models_name) VALUES ('$name')";
    $run = execute_query($sql);
    if ($run) { ?>
      <script>
          alert("Add model successfully !");
          window.location.href = "manage_models.php";
      </script>
    <?php } else { ?>
       <script>
           alert("Add model failed !");
           window.location.href = "manage_models.php"; 
       </script>
    <?php } } ?>
<form style="width: fit-content; margin-top: 30px; color: white;" action="add_models.php" method="POST">
    <fieldset>
        <legend>Add Model</legend>
        Models Name: <input type="text" name="name" required maxlength="30">
        <br><br>
        <input type="submit" value="Add" name="add">
    </fieldset>
</form>