<?php
require_once "header.php";

$_query = "SELECT * FROM products";

if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $_query = "SELECT * FROM products 
    WHERE products_name LIKE '%$keyword%'";
    $run = execute_query($_query);
    if ($run->num_rows == 0) {  ?>
        <script>
            alert("Products not found");
            window.location.href = "";
        </script>
<?php }
}
$result = execute_query($_query);
?>

<form class="frm123" action="" method="POST" style="width: fit-content; color: white;">
    <fieldset>
        <legend> Search products </legend>
        <input type="text" name="keyword" required maxlength="15" placeholder="search..."> <br> <br>
        <input type="submit" value="Search" name="search">
    </fieldset>
</form>

<br><br>

<table border="3px" style="color: white;">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>PRICE</th>
        <th>QUANTITY</th>
        <th>DETAIL</th>
        <th>IMAGE</th>
        <th>MODELS</th>
        <th>TYPES</th>
        <th>OPTIONS</th>
    </tr>
    <?php
    while ($products = mysqli_fetch_array($result)) {
    ?>
        <tr>
            <td><?= $products[0] ?></td>
            <td><?= $products[1] ?></td>
            <td><?= $products[2] . "$" ?></td>
            <td><?= $products[3] ?></td>
            <td><?= $products[4] ?></td>
            <td><img src="image/<?= $products[5] ?>" width="100" height="100"></td>
            <?php
            $_query1 = "SELECT * FROM models";
            $result1 = execute_query($_query1);
            while ($models = mysqli_fetch_array($result1)) {
                if ($models['models_id'] == $products['models_id']) {
                    $models_name = $models['models_name'];
                }
            }
            ?>
            <td><?= $models_name ?></td>
            <?php
            $_query2 = "SELECT * FROM products_type";
            $result2 = execute_query($_query2);
            while ($type = mysqli_fetch_array($result2)) {
                if ($type['products_type_id'] == $products['products_type_id']) {
                    $type_name = $type['products_types_name'];
                }
            }
            ?>
            <td><?= $type_name ?></td>
            <td>
                <form class="frm_up_de" action="update_products.php" method="POST">
                    <input type="hidden" name="id" value="<?= $products[0] ?>">
                    <input type="submit" value="UPDATE">
                </form>
                <form class="frm_up_de" action="delete_products.php" method="POST" 
                onsubmit="return confirmDelete();">
                    <input type="hidden" name="id" value="<?= $products[0] ?>">
                    <input type="submit" value="DELETE">
                </form>
            </td>
        </tr>
    <?php } ?>
</table>
<script>
    function confirmDelete() {
        return confirm("Are you sure to delete this product?");
    }
</script>