<?php
require_once "header.php";
$sql = "SELECT * FROM products_type";
$result = execute_query($sql);
?>
<br>
<br>
<br>
<table border="3px" style="color: white; width: fit-content;">
    <tr>
        <th>Type ID</th>
        <th>Type name</th>
        <th>Options</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($result)){
        $id = $row[0];
        $name = $row[1];
    ?>
    <tr>
        <td><?= $id?></td>
        <td><?= $name?></td>
        <td>
        <form class='frm_inline' action="update_types.php" method="POST">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Update'>
            </form>
            <form class='frm_inline' action='delete_types.php' method="POST" onsubmit="return confirmDelete();">
                <input type='hidden' name='id' value='<?= $id ?>'>
                <input type='submit' value='Delete'>
            </form>
        </td>
    </tr>
    <?php } ?>
</table>
<script>
    function confirmDelete(){
        return confirm("Are you sure to delete this type?");
    }
</script>