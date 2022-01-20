<!-- this file is to display products follow search by keywords -->

<?php
require_once "header.php";
?>

<body>

    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
    if (isset($_POST['search'])) {
        $keyword = $_POST['keyword'];
        $sql = "SELECT * FROM products 
            WHERE products_name LIKE '%$keyword%'";
        $run = execute_query($sql);
        if ($run->num_rows == 0) { ?>
            <script>
                alert("Products not found!");
                window.location.href = "index.php";
            </script>
            <?php } else {
                ?> <h3 style="color: orange; margin-left:3%">Searching for: <?= $keyword?></h3>
                <?php
            while ($row = mysqli_fetch_array($run)) { ?>
                <div class="h_product" style="height: 300px;width: 350px; margin-left: 40px;">
                    <div>
                        <a href="products_detail.php?products_id=<?= $row[0] ?>">
                            <img src="image/<?= $row['products_image'] ?>" alt="">
                        </a>
                    </div>
                
                    <div style="margin-top: -10%; font-size: 18px; color: black; font-weight: bold;">
                        <h4>
                            <a href="products_detail.php?products_id=<?= $row[0] ?>"><?= $row['products_name'] ?></a>
                            <br>
                            <?= $row['products_price'] . "$" ?>
                        </h4>
                    </div>
                    <br> <br>
                </div>
    <?php }
        }
    } ?>
</body>