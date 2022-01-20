<?php
require_once "header.php";

$user_id = $_SESSION['user_id'];


?>

<style>
    .order-main {
        width: 100%;
        /* background-color: #eeeeee; */
        overflow: hidden;
        font-size: 10px;
    }

    .order-list {
        width: 40%;
        overflow: hidden;
        margin: auto;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .order-card {
        width: 100%;
        height: fit-content;
        background-color: #ffffff;
        box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, .03);
        padding: 15px;
        border-radius: 5px;
        margin-bottom: 20px;
    }

    .order-header {
        text-decoration: none;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<div class="order-main">
    <div class="order-list">
        <h1> My Order </h1>
        <?php
        $sql = "SELECT * FROM `order` Where user_id = ' $user_id' ";
        $myOrder = execute_query($sql);
        while ($order = mysqli_fetch_array($myOrder)) {
        ?>
            <div class="order-card">
                <div class="order-header">
                    <h4> <a style="color: blueviolet; font-weight: bold;" href="order_detail.php?orderID=<?= $order['order_id'] ?>"> Order #<?= $order['order_id'] ?> </a> </h4>
                </div>
                <div class="order-body">
                    Created Date: <?= $order['created_time'] ?>
                    <br><br>
                    Total Price: <?= $order['total'] . "$"  ?>
                </div>
            <?php } ?>
            </div>
    </div>
</div>