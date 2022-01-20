<?php
require_once "header.php";
if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $sql = "INSERT INTO products_type (products_types_name) VALUES ('$name')";
    $run = execute_query($sql);
    if ($run) { ?>
      <script>
          alert("Add type successfully !");
          window.location.href = "manage_types.php";
      </script>
    <?php } else { ?>
       <script>
           alert("Add type failed !");
           window.location.href = "manage_types.php";
       </script>
    <?php } } ?>
<form style="width: fit-content; margin-top: 30px; color: white;" action="add_types.php" method="POST">
    <fieldset>
        <legend>Add Type</legend>
        Type Name: <input type="text" name="name" required maxlength="30">
        <br><br>
        <input type="submit" value="Add" name="add">
    </fieldset>
</form>