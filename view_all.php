<!-- this file is to display all products when click view all in the website -->

<?php
require_once "header.php";
?>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <div id="hot_products" style="width: 90%;height: fit-content;">
        <?php
        if (isset($_GET['products_type_id'])) {
            $p_type_id = $_GET['products_type_id'];
            $sql = "SELECT products_id, products_image, products_name,products_price FROM products WHERE products_type_id = '$p_type_id'";
            $run = execute_query($sql);
            while ($row = mysqli_fetch_array($run)) { ?>
                <div class="h_product" style="height: 300px;width: 350px;">
                    <div>
                        <a href="products_detail.php?products_id=<?= $row[0]?>">
                            <img src="image/<?= $row[1] ?>" alt="">
                        </a>
                    </div>
                    <hr>
                    <div style="margin-top: -10%; font-size: 15px;">
                        <h4>
                            <a href="products_detail.php?products_id=<?= $row[0]?>"><?= $row[2] ?></a>
                            <br>
                            <?= $row[3] . "$" ?>
                        </h4>
                    </div>
                    <br> <br>
                </div>
        <?php }
        } ?>
    </div>
</body>