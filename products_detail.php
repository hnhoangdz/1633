<!-- this file is to display in detail products -->

<?php
require_once "header.php";
?>

<body>

    <!--  -->
    <h1 style="color: black;text-align: center; ">Products Detail</h1>
    <br>
    <div id="products_detail" style=" color: grey;">
        <div>
            <?php
            if (isset($_GET['products_id'])) {
                $products_id = $_GET['products_id'];
                $sql = "SELECT * FROM products WHERE products_id = '$products_id'";
                $run = execute_query($sql);
                while ($row = mysqli_fetch_array($run)) { ?>
                    <div id="igm">
                        <img src="image/<?= $row['products_image'] ?>" alt="">
                    </div>
                    <div id="info">
                        <h2><?= $row['products_name'] ?></h2> <br><br>
                        Price: <b><?= $row['products_price'] . "$" ?></b>
                        <br>
                        Detail: <?= $row['products_detail'] ?>
                        <br>
                        <?php
                        $m_id = $row['models_id'];
                        $sql3 = "SELECT models_name FROM models WHERE models_id = '$m_id'";
                        $run3 = execute_query($sql3);
                        $models_name = mysqli_fetch_array($run3);
                        ?> Models: <b><?= $models_name[0] ?></b>
                        <br>
                        <?php
                        $p_id = $row['products_type_id'];
                        $sql4 = "SELECT products_types_name FROM products_type WHERE products_type_id = '$p_id'";
                        $run4 = execute_query($sql4);
                        $type_name = mysqli_fetch_array($run4);
                        ?> Type: <b><?= $type_name[0] ?></b>
                        <br>
                        Available: <b><?= $row['products_quantity'] ?></b>
                        <br>

                        <?php

                        if (isset($_POST['add']) &&  (int)$row['products_quantity'] != 0) {
                            //gan bien
                            $user_id = $_SESSION['user_id'];
                            $products_name = $_POST['products_name'];
                            $products_price = $_POST['products_price'];
                            $products_image = $_POST['products_image'];
                            $products_quantity = $_POST['products_quantity'];
                            $_SESSION['current_quantity'] = $products_quantity;

                            // 
                            $sql7 = "SELECT * FROM cart Where user_id = '$user_id'";
                            $run7 = execute_query($sql7);
                            $check = false;
                            while ($row7 = mysqli_fetch_array($run7)) {
                                if ($row7['products_id'] == $products_id) {
                                    $sql8 = "UPDATE cart SET products_quantity = products_quantity + $products_quantity Where products_id = '" . $row7['products_id'] . "' ";
                                    $run8 = execute_query($sql8);
                        ?>
                                    <script>
                                        alert("You added two more");
                                        window.location.href = "cart.php";
                                    </script>
                                <?php
                                    $check = true;
                                }
                            }
                            if ($check == false) {
                                $sql5 = "INSERT INTO `cart` (`cart_id`, `user_id`, `products_id`, `products_name`, `products_quantity`, `products_price`, `products_image`) VALUES (NULL,$user_id, '" . $row['products_id'] . "', '" . $products_name . "', '" . $products_quantity . "', '" . $products_price . "', '" . $products_image . "');";
                                $run5 = execute_query($sql5);
                                if ($run5) { ?>
                                    <script>
                                        alert("Add to cart succesfully");
                                        window.location.href = "cart.php";
                                    </script>
                                <?php
                                    $sql6 = "UPDATE products SET products_quantity = products_quantity - $products_quantity Where products_id = '" . $row['products_id'] . "' ";
                                    $run6 = execute_query($sql6);
                                } else { ?>
                                    <script>
                                        alert("Add failed! You need to login");
                                        window.location.href = "";
                                    </script>

                            <?php } } } 
                            elseif (isset($_POST['add']) && (int)$row['products_quantity'] == 0) { ?>
                            <script>
                                alert("Unavailable Product");
                                Window.location.href = "";
                            </script>
                        <?php } ?>
                        <!-- using action of form to add an item by method Post -->
                        <form action="" method="POST" id="add-to-cart" style="margin:0px">
                            <input type="hidden" name="products_name" value="<?= $row['products_name'] ?>">
                            <input type="hidden" name="products_price" value="<?= $row['products_price'] ?>">
                            <input type="hidden" name="products_image" value="<?= $row['products_image'] ?>">
                            Amount: <input style=" margin-left: 10px;  margin-top: 10px; height: 30px; line-height: 30px;" type="number" value="1" min="0" max="<?= $row['products_quantity'] ?>" name="products_quantity" size="1" />
                            <br>
                            <input style="margin-top: 10px; background: burlywood; padding: 10px;
                                display: inline-block; color: whitesmoke; border: 1px solid #000;" type="submit" name="add" value="Add to cart">
                            <style>

                            </style>
                        </form>
                    </div>
            <?php }
            } ?>
        </div>
    </div>
    </div>
</body>