<!-- This file is to display the homapge of website  -->

<?php
require_once "header.php";
?>
<body>
    <!-- Slide show -->
    <!-- image slider starts -->
    <div class="slider">
        <div class="slides">
            <!-- radio buttons starts -->
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <!-- radio button ends -->
            <!-- slide images starts -->
            <div class="slide first">
                <img src="image/aventador.png" alt="aventador">
            </div>
            <div class="slide">
                <img src="image/urus.png" alt="urus">
            </div>
            <div class="slide">
                <img src="image/hurracan.png" alt="huracan">
            </div>
            <!-- slide images end -->
            <!-- automatic navigation starts -->
            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <div class="auto-btn3"></div>
            </div>
            <!-- automatic navigation ends -->
        </div>
        <!-- manual navigation starts -->
        <div class="navigation-manual">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <label for="radio3" class="manual-btn"></label>
        </div>
        <!-- manual navigation ends -->
    </div>
    <!-- image slider end -->

    <!-- auto transfer slide image -->
    <script type="text/javascript">
        var time = 1;
        setInterval(function() {
            document.getElementById('radio' + time).checked = true;
            time++;
            if (time > 3) {
                time = 1;
            }
        }, 10000);
    </script>
    <br>
    <br>
    <br>
    <!-- Hot products -->
    <div id="hot_products" style="width: 90%;height: 700px;">

        <!-- Title -->
        <h2 style="margin-left: 40%; color: black;">HOT PRODUCTS</h2>
<br>
<br>
<br>
        <!-- View all -->
        <div class="view-all">
            <?php
            $viewall1 = "SELECT products_type_id FROM products_type";
            $run1 = execute_query($viewall1);
            $row1 = mysqli_fetch_array($run1);
            ?>
            <a href="view_all.php?products_type_id=<?= $row1[0] ?>">View all >></a>
        </div>

        <!-- Hot products detail -->
        <?php
        $_query = "SELECT products_id,products_image, products_name,products_price FROM products WHERE products_type_id = 1 LIMIT 6";
        $run = execute_query($_query);
        while ($row = mysqli_fetch_array($run)) {
        ?>
            <div class="h_product" style="height: 250px;width: 350px;">
                <div>
                    <a href="products_detail.php?products_id=<?= $row[0] ?>">
                        <img src="image/<?= $row[1] ?>" alt="">
                    </a>
                </div>
                <div style="margin-top: -10%; font-size: 15px; color: black; font-weight: bold;">
                    <h4>
                        <a href="products_detail.php?products_id=<?= $row[0] ?>"><?= $row[2] ?></a>
                        <br>
                        <?= $row[3] . "$" ?>
                    </h4>
                </div>
                <br> <br>
            </div>
        <?php } ?>
    </div>

    <br><br>
    <hr size="1px" noshade width="86%">
    <br><br>


    <!-- Used -->
    <div id="used" style="width: 90%;height: 700px;">
        <h2 style="margin-left: 45%; color: black;">USED</h2>
        <br>
        <br>
        <br>
        <div class="view-all">
            <?php
            $viewall1 = "SELECT products_type_id FROM products_type WHERE products_type_id = 2";
            $run1 = execute_query($viewall1);
            $row1 = mysqli_fetch_array($run1);
            ?>
            <a href="view_all.php?products_type_id=<?= $row1[0] ?>">View all >></a>
        </div>
        <?php
        $_query = "SELECT products_id,products_image, products_name,products_price FROM products WHERE products_type_id = 2 LIMIT 6";
        $run = execute_query($_query);
        while ($row = mysqli_fetch_array($run)) {
        ?>
            <div class="u_product" style="height: 250px;width: 350px;">
                <div>
                    <a href="products_detail.php?products_id=<?= $row[0] ?>">
                        <img src="image/<?= $row[1] ?>" alt="">
                    </a>
                </div>
                
                <div style="margin-top: -10%; font-size: 15px;">
                    <h4>
                        <a href="products_detail.php?products_id=<?= $row[0] ?>"><?= $row[2] ?></a>
                        <br>
                        <?= $row[3] . "$" ?>
                    </h4>
                </div>
                <br> <br>
            </div>
        <?php } ?>
    </div>
    <br>
    <br>
    <br>
    <!-- View all used products  -->

    <?php 
        require_once "footer.php";
    ?>

</body>

</html>