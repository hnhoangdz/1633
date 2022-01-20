<?php
require_once "functions.php";
require_once "restrict.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MANAGEMENT</title>
    <link rel="stylesheet" href="css\homepage.css">
</head>

<body>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Products</a>
            <div class="dropdown-content">
                <a href="manage_products.php">Manage products</a>
                <a href="add_products.php">Add products</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Models</a>
            <div class="dropdown-content">
                <a href="manage_models.php">Manage models</a>
                <a href="add_models.php">Add models</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="javascript:void(0)" class="dropbtn">Types</a>
            <div class="dropdown-content">
                <a href="manage_types.php">Manage types</a>
                <a href="add_types.php">Add types</a>
            </div>
        </li>
        <li class="dropdown">
            <a href="customer.php" class="dropbtn">Customer</a>
        </li>
        <li class="dropdown">
            <a href="cart.php" class="dropbtn">Cart</a>
        </li>
        <li><a onclick="about();">About us</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
    <script type="text/javascript">
        function about() {
            alert("Copyright by FPT Greenwich !");
        }
    </script>
</body>

</html>