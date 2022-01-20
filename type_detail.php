<!-- this file is to display types of products -->

<?php
require_once "header.php";
?>
<body>
    <br>
    <br>
    <br>
    <br>
    <br>
    <!--  -->
    <div id="hot_products" style="width: 90%;height: fit-content;">
        <!-- <h2 style="margin-left: 40%; color: white;">HOT PRODUCTS</h2> -->
        <?php
        if (isset($_GET['products_type_id'])) {
            $type_id = $_GET['products_type_id'];
            $sql1 = "SELECT products_types_name FROM products_type Where products_type_id = '$type_id'";
            $run1 = execute_query($sql1);
            $row1 = mysqli_fetch_array($run1);
            ?> <h2 style="color: orange; margin-left: 40%;" ><?=$row1[0]?></h2>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <?php
            $sql = "SELECT products_id, products_image, products_name,products_price FROM products WHERE products_type_id = '$type_id'";
            $run = execute_query($sql);
            while ($row = mysqli_fetch_array($run)) { ?>
                <div class="h_product" style="height: 300px;width: 350px;">
                    <div>
                        <a href="products_detail.php?products_id=<?= $row[0] ?>">
                            <img src="image/<?= $row[1] ?>" alt="">
                        </a>
                    </div>
                   
                    <div style="margin-top: -10%; font-size: 18px; color: black; font-weight: bold;">
                        <h4>
                            <a href="products_detail.php?products_id=<?= $row[0] ?>"><?= $row[2] ?></a>
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