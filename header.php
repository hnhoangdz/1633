<!--  this file is to build header for each website  -->

<?php
require_once "functions.php";
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SNACKY LUXURY CAR</title>
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700" rel="stylesheet">
    <style>
        #cart, #login,#logout {
           
            float: right;
        }

        a{
            font-weight: bolds;
        }

        div#logout {
            width: fit-content;
        }

        div#login_logout {
            display: inline;
        }

        #igm,
        #info {
            float: left;
            margin-right: 10%;
        }

        #igm {
            padding-left: 5%;
        }

        #igm img {
            width: 370px;
            height: 320px;
        }

        #add-to-cart input [type="text"] {
            margin-top: 50px;
            height: 30px;
            line-height: 30px;
        }

        #add-to-cart input [type="submit"] {
            margin-top: 50px;
            background: burlywood;
            padding: 15px;
            display: inline-block;
            color: whitesmoke;
            border: 1px solid #000;
        }
        
        *{
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: bold;
        }

    </style>

<body>


    <!-- Header - title bar  -->
    <div class="header" style="background-color: #eee; width: 99.8%; display: block; font-size: 100%;border: white solid 1px;height: 120px;">
        <div>
            <div id="login_logout">
                <?php
                if(isset($_SESSION['username'])){ ?>
                    <div id="login" style="margin-top:1%;margin-right: 2%;">
                    <form action="logout.php" method="POST" enctype="multipart/form-data">
                        <input type="submit" style="background-color: #06beb6; border-radius: 8px;" value="Logout" name="logout">
                    </form>
                </div>
                <?php } else { ?>
                <div id="login" style="margin-top:1%;margin-right: 2%;">
                    <form action="login.php" method="POST" enctype="multipart/form-data">
                        <input style="background-color: #2193b0; border-radius: 8px;" type="submit" value="Login" name="login">
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="logo" style="width: 15%; position: relative; margin-top: 4.5%; margin-left: 3%;">
            <a href="index.php" class="logo_img">
                <img src="image/main.png" alt="mainlogo" style="margin-left: 28%;" width="30%">
                <strong style="color: black;  font-family: 'Courier New', Courier, monospace;">SnackyLuxCar</strong>
            </a>
        </div>
        <div class="title_bar">
            <div class="list-items">
                <ul>
                    <li class="models-list">
                        <a href="#">
                            <b>MODELS</b> 
                        </a>
                        <div class="models-item">
                            <ul class="models-detail">
                                <!-- get datase from mysql to assgint to models -->
                                <?php
                                $sql = "SELECT * FROM models";
                                $run = execute_query($sql);
                                while ($models = mysqli_fetch_array($run)) { ?>
                                    <li><a href="models_detail.php?models_id=<?= $models['models_id'] ?>">
                                            <?= $models['models_name'] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li class="type-list">
                        <a href="#">
                            <b>TYPE</b>
                        </a>
                        <div class="type-item">
                            <ul class="type-detail">
                                <!-- get database from mysql to assign to types of products -->
                                <?php
                                $sql1 = "SELECT * FROM products_type";
                                $run1 = execute_query($sql1);
                                while ($type = mysqli_fetch_array($run1)) { ?>
                                    <li><a href="type_detail.php?products_type_id=<?= $type[0] ?>">
                                            <?= $type[1] ?></a></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="https://media.lamborghini.com/english" target="_blank" ><b>NEWS</b></a>
                    </li>
                    <li>
                        <a href="https://www.facebook.com/profile.php?id=100013336411537" target="_blank"><b>ABOUT US</b></a>
                    </li>
                    <li>
                        <a href="myorder.php"><b>MY ORDER</b></a>
                    </li>
                </ul>
                
                <div id="cart" style="margin-top: 0%;margin-right:5%;background-color: transparent;">
                <a href="cart.php">
                    <button>
                        <i class="fa fa-cart-plus" style="font-size: 150%; color:black"></i>
                    </button>
                </a>
            </div>
            </div>
            <!-- Seach bar to find products name -->
             <div class="search" style="margin-left: 40%;width: fit-content;">
                <form action="search.php" style="padding: 5px ; margin-left: 253px;" method="POST" enctype="multipart/form-data">
                    <input type="text" name="keyword" placeholder="Search..." style="font-size: 15px;border-radius: 8px;">
                    <button type="submit" name="search" style="border-style: none; margin-left: -30px;background-color: transparent;">
                    <i class="fa fa-search"></i>
                    </button> 
                </form>
            </div>
        </div>
    </div>
    </div>
</body>