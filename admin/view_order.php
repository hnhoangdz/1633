<?php
require_once "header.php";

if (isset($_POST['id'])) {
    $orderID = $_POST['id'];
}
?>
<form action="" style="color: white;">
    <table border="1px">
        <tr>
            <th>OrderID</th>
            <th>Product Name</th>
            <th> Price</th>
            <th> Quantity</th>
            <th>Total</th>
        </tr>
        <?php
        $sql1 =  "SELECT p.products_name,p.products_price,od.products_quantity,o.total FROM `order` o, `order_detail` od,`products` p Where o.order_id = '$orderID' AND od.order_id = '$orderID' AND od.products_id = p.products_id";
        $run1 = execute_query($sql1);
        while ($row1 = mysqli_fetch_array($run1)) { ?>
            <tr>
                <td><?= $orderID ?></td>
                <td><?= $row1[0] ?></td>
                <td><?= $row1[1] ?></td>
                <td><?= $row1[2] ?></td>
                <td><?= $row1[3] ?></td>
            </tr>
        <?php } ?>
    </table>
</form>