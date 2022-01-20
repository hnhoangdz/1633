<?php
require_once "header.php";

$id = $_POST['id'];
if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $sql = "UPDATE products_type SET products_types_name = '$name' WHERE products_type_id = '$id'";
    $run = execute_query($sql);
    if ($run) { ?>
        <script type="text/javascript">
            alert("Update types successfully !");
            window.location.href = "manage_types.php";
        </script>
    <?php
    } else { ?>
        <script type="text/javascript">
            alert("Update types failed !");
            window.location.href = "manage_types.php";
        </script>
<?php }
} ?>

<form style="color: whitesmoke;" class="frm123" action="" method="POST">
    <fieldset>
        <legend>Update Type</legend>
        Type name:
        <?php
        $qry = "SELECT * FROM products_type WHERE products_type_id = '$id'";
        $result = execute_query($qry);
        $cls = mysqli_fetch_array($result);
        ?>
        <input type="hidden" name="id" value="<?= $cls[0] ?>">
        <input type="text" name="name" value="<?= $cls[1] ?>" size="30"> <br><br>
        <input type="submit" name="update" value="Update">
    </fieldset>
</form>