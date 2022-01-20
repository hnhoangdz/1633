<?php
require_once "header.php";
$qry = "SELECT * FROM `order`";
$result = execute_query($qry);
$total = $result->num_rows;
?>
<center>
<form class="frm" style="width: fit-content; color: whitesmoke;">
    <fieldset class="field">
        <legend>TOTAL</legend>
        <section class='sec'> <?= $total ?> </section>
    </fieldset>
    </form>
    <br><br>

<table border="3px" style="color: white; width: fit-content;">
    <tr>
        <th>Order ID</th>
        <th>User ID</th>
        <th>Total price</th>
        <th>Created time</th>
        <th>Option</th>
    </tr>
    <?php
    while ($row = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?= $row[0] ?> </td>
            <td><?= $row[1] ?> </td>
            <td><?= $row[2] ?> </td>
            <td><?= $row[3] ?> </td>
            <td>
                <form action="view_order.php" method="POST">
                    <input type="hidden" name="id" value="<?= $row[0] ?>">
                    <input type="submit" value="View detail" >
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
</center>

