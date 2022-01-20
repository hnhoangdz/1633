<!-- this file is to display in detail products to update -->

<?php
require_once "header.php";

$id = $_POST['id'];
$query = "SELECT * FROM products WHERE products_id = '$id'";
$result = execute_query($query);
$row = mysqli_fetch_array($result);
$name = $row['products_name'];
$price = $row['products_price'];
$quantity = $row['products_quantity'];
$detail = $row['products_detail'];
$image = $row['products_image'];
$models = $row['models_id'];
$type = $row['products_type_id'];

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $detail = $_POST['detail'];
    $image = "";
    $models = $_POST['models'];
    $type = $_POST['type'];
    if (isset($_FILES['image']) && $_FILES['image']['size'] != 0) {
        // initialize variable to store file image in temporary directory
        $temp_name = $_FILES['image']['tmp_name'];
        // initialize variable to store image'name
        $img_name = $_FILES['image']['name'];
        // Now to find where is the file we need to find the last dot
        // divide image'name base on dot 
        $parts = explode(".", $img_name);
        // find the last dot
        $lastIndex = count($parts) - 1;
        // get the extension of file image (eg:.jpg,.png)
        $extension = $parts[$lastIndex];
        // create new image's name
        $image = rand(10000, 99999) . "." . $extension;
        // $image = $name . "." . $extension;
        // create address file image will move to
        $image_folder = "image/";
        $destination = $image_folder . $image;
        // move file image from temporary direct to address created
        move_uploaded_file($temp_name, $destination);
    } else {
        $image = $row['products_image'];
    }

    $query2 = "UPDATE products SET products_name = '$name', products_price = '$price',
    products_quantity = '$quantity', products_detail = '$detail', products_image = '$image',
    models_id = '$models', products_type_id = '$type' Where products_id = '$id'";
    $result2 = execute_query($query2);

    if ($result2) { ?>
        <script>
            alert("Update product successfully");
            window.location.href = "manage_products.php";
        </script>
    <?php } else { ?>
        <script>
            alert("Update failed");
            window.location.href = "manage_products.php";
        </script>
<?php }
} ?>

<form style="color: white; width: fit-content;" action="" class="frm"
 method="POST" enctype="multipart/form-data">
    <fieldset>
        <legend>UPDATE PRODUCTS</legend>
        Name: <input type="text" name="name" 
        required maxlength="50" value="<?= $name ?>">
        <br><br>
        Price: <input type="text" name="price" required maxlength="20" 
        value="<?= $price ?>"> E.g: 20000.00
        <br><br>
        Quantity: <input type="number" name="quantity" 
        required maxlength="2" min='0' value="<?= $quantity ?>">
        <br><br>
        Detail: <input type="text" name="detail" require maxlength='1000'
        value="<?= $detail?>" style="overflow-y: auto;">
        <br><br>
        Image: <img src="image/<?= $image ?>" width="150" height="150">
        <br><br>
        <input type="file" name="image" accept="image/*">
        <br><br>
        Models: <?php
                $sql = "SELECT *FROM models";
                $run = execute_query($sql);
                ?>
        <select name="models">
            <?php
            while ($row = mysqli_fetch_array($run)) {
                if ($row['models_id'] == $models) { ?>
                    <option value="<?= $models ?>" selected>
                     <?= $row['models_name'] ?> </option>
                <?php } else { ?>
                    <option value="<?= $row['models_id'] ?>">
                     <?= $row['models_name'] ?> </option>
            <?php }
            } ?>
        </select>
        <br><br>
        Type: <?php
                $sql1 = "SELECT *FROM products_type";
                $run1 = execute_query($sql1);
                ?>
        <select name="type">
            <?php
            while ($row1 = mysqli_fetch_array($run1)) {
                if ($row1['products_type_id'] == $type) { ?>
                    <option value="<?= $type ?>" selected> 
                    <?= $row1['products_types_name'] ?> </option>
                <?php } else { ?>
                    <option value="<?= $row1['products_type_id'] ?>"> 
                    <?= $row1['products_types_name'] ?> </option>
            <?php }
            } ?>
        </select>
        <br><br>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="UPDATE" name="update">
    </fieldset>
</form>