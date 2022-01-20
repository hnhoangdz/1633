<?php
require_once "header.php";

$user_id = $_SESSION['user_id'];
$orderID = $_GET['orderID'];
$sql = "SELECT * FROM `order` AS o, `user` AS u WHERE o.user_id = u.user_id AND `order_id` = '$orderID' ";
$run = execute_query($sql);
$orderInfo = mysqli_fetch_array($run);
$sql1 = "SELECT products_name,o.products_price,  o.products_quantity,products_image FROM `order_detail` AS o, `products` AS p Where o.products_id = p.products_id AND `order_id` = '$orderID' ";
$run1 = execute_query($sql1);

?>

<style>
    .order-main {
        width: 100%;
        /* background-color: #eeeeee; */
        overflow: hidden;
        font-size: 10px;
    }

    .order-list {
        width: 60%;
        overflow: hidden;
        margin: auto;
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }

    .order-body-image {
        width: 25%;
    }

    .order-body-detail {
        width: 55%;
        float: right;
    }

    .order-card-detail {
        width: 100%;
        height: 750px;
        background-color: #ffffff;
        box-shadow: 0px 0px 10px 3px rgba(0, 0, 0, .03);
        padding: 14px;
        border-radius: 4px;
        margin-bottom: 20px;
    }
</style>

<div class="order-main">
    <div class="order-list">
        <h1>Order Detail</h1>
        <div class="order-card-detail">
            <p>
                <h3>Information User</h3>
                <b>Name:</b> <?= $orderInfo['name'] ?>
                <br>
                <b>Address:</b> <?= $orderInfo['address'] ?>
                <br>
                <b>Phone:</b> <?= $orderInfo['phone'] ?>
                <br>
                <b>Email:</b> <?= $orderInfo['email'] ?>
                <br>
            </p>
            <?php
            while ($product = mysqli_fetch_array($run1)) { ?>
                <div class="order-body-detail">
                    Name: <?= $product[0] ?>
                    <br><br>
                    Price: <?= $product[1] ?>
                    <br><br>
                    Amount: <?= $product[2] ?>
                    <br><br>
                </div>
                <div class="order-body-image">
                    <img src="image/<?= $product[3] ?>" width="250px" height="100px"><br><br>
                </div>
            <?php } ?>
            <hr>
            <span style="margin-left: 45%;">
                Total price: <?= $orderInfo['total'] ?>
            </span>
        </div>
    </div>
</div>