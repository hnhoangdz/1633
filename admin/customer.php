<?php
require_once "header.php";


if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $_query = "SELECT * FROM user WHERE username LIKE '%$keyword%' or name LIKE '%$keyword%' 
    or phone LIKE '%$keyword%' or email LIKE '%$keyword%' or address LIKE '%$keyword%' ";
    $run = execute_query($_query);
    if ($run->num_rows == 0) {  ?>
        <script>
            alert("User not found");
            window.location.href = "";
        </script>
<?php }
}
$result = execute_query($_query);
?>

<form class="frm123" action="" method="POST" style="width: fit-content; color: white;">
    <fieldset>
        <legend> Search user </legend>
        <input type="text" name="keyword" required maxlength="15" placeholder="search..."> <br> <br>
        <input type="submit" value="Search" name="search">
    </fieldset>
</form>

<br><br>

<?php
$sql = "SELECT * FROM user where role = 'customer'";
$run = execute_query($sql);
?>
<br>
<br>
<br>
<table border="3px" style="color: white; width: fit-content;">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Address</th>
        <th>Password</th>
        <th>Option</th>
    </tr>
    <?php
    while($row = mysqli_fetch_array($run)){ ?>
    <tr>
        <td><?= $row[0] ?> </td>
        <td><?= $row[1] ?></td>
        <td><?= $row[2] ?></td>
        <td><?= $row[3] ?></td>
        <td><?= $row[4] ?></td>
        <td><?= $row[5] ?></td>
        <td><?= $row[6] ?></td>
        <td>
            <form action="update_pass.php" method="POST">
                <input type="hidden"  name = "id" value="<?=$row[0]?>">
                <input type="submit" value="Update Password">
            </form>
        </td>
    </tr>
    <?php } ?>
</table>

