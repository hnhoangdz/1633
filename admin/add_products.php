<?php
require_once "header.php";

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $detail = $_POST['detail'];
    $image = "";
    $models = $_POST['models'];
    $type = $_POST['type'];
    // this code is to update and fix image
    // check if clicked image and capacity of image >0
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
    }
    $insert = "INSERT INTO products (products_name, products_price, products_quantity, products_detail, products_image, models_id, products_type_id)
        VALUES ('$name', '$price', '$quantity', '$detail', '$image', '$models','$type')";
    $result = execute_query($insert);
    if ($result) { ?>
        <script>
            alert("Added product sucessfully");
            window.location.href = "manage_products.php";
        </script>
    <?php } else { ?>
        <script>
            alert("Failed");
            window.location.href = "";
        </script>
    <?php }
} else { ?>

    <form action="" style="color: white; width: fit-content;"
    method="POST" enctype="multipart/form-data">
        <fieldset>
            <legend>Add products</legend>
            Name: <input type="text" name="name" required maxlength="50">
            <br><br>
            Price: <input type="text" name="price" required maxlength="20"> e.g: 2000000.00
            <br><br>
            Quantity: <input type="number" name="quantity" min='1' required maxlength="2">
            <br><br>
            <p>
                Detail:
                <textarea name="detail" required maxlength="1000" cols="30" rows="10">
        </textarea>
            </p>
            <br><br>
            Image: <input type="file" name="image" required>
            <br><br>
            Models: <?php
                    $sql = "SELECT *FROM models";
                    $run = execute_query($sql);
                    ?>
            <select name="models">
                <?php
                while ($row = mysqli_fetch_array($run)) { ?>
                    <option value="<?= $row['models_id']?>"> <?= $row['models_name'] ?> </option>
                <?php } ?>
            </select>
            <br><br>
            Type: <?php
                    $sql1 = "SELECT *FROM products_type";
                    $run1 = execute_query($sql1);
                    ?>
            <select name="type">
                <?php
                while ($row1 = mysqli_fetch_array($run1)) { ?>
                    <option value="<?= $row1['products_type_id']?>"> <?= $row1['products_types_name'] ?> </option>
                <?php } ?>
            </select>
            <br><br>
            <input type="submit" value="Add" name="add">
        </fieldset>
    </form>
<?php } ?>