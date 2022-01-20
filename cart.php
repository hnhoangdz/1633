<?php
require_once "header.php";

$user_id = $_SESSION['user_id'];
$time = date("Y/m/d") . " " . date("H:i");
$sql = "SELECT * FROM cart Where user_id = '$user_id'";
$run = execute_query($sql);

// $_SESSION['check'] = 1;

if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $select = "SELECT products_quantity FROM cart Where products_id = '$delete_id'";
    $start = execute_query($select);
    $get = mysqli_fetch_array($start);
    $current_quantity = $get[0];
    $sql = "DELETE FROM cart Where products_id = '$delete_id'";
    $run = execute_query($sql);
    if ($run) {
        $sql1 = "UPDATE products SET products_quantity = products_quantity + $current_quantity Where products_id = '$delete_id '";
        $run1 = execute_query($sql1);
        header("Location: cart.php");
    } else { ?>
        <script>
            alert("Delete failed");
            window.location.href = "";
        </script>
<?php }
}



if (isset($_POST['buy_all'])) {
    $_SESSION['check'] = 0;
    while($row1 = mysqli_fetch_array($run)){
        $total_price += $row1['products_price'] * $row1['products_quantity'];
    }
    $insertOrder = execute_query ("INSERT INTO `order` (`order_id`, `user_id`, `total`, `created_time`) 
    VALUES (NULL, '".$user_id."', '".$total_price."','".$time."')");
    $sql11 = "SELECT order_id FROM `order` Where user_id =  '".$user_id."' AND created_time = '".$time."' ";
    $run = execute_query($sql11);
    $r1 = mysqli_fetch_array($run);
    $selectOrderID = $r1[0];
    $sql12 = "SELECT products_id, products_price, products_quantity FROM cart Where user_id = '".$user_id."'";
    $run0 = execute_query($sql12);  
    while($row10 = mysqli_fetch_array($run0)){
        $sql2 = "INSERT INTO order_detail(order_id,products_id, products_price, products_quantity, created_time) 
        VALUES ('$selectOrderID','$row10[0]','$row10[1]','$row10[2]','$time')";
        $insertOrderDetail = execute_query($sql2); 
    }
    $delete = execute_query("DELETE FROM cart Where user_id = '$user_id'");
}


if (isset($_POST['+'])) {
    $id=$_POST['id'];
    $sql4= "UPDATE cart SET products_quantity = products_quantity + 1
    WHERE user_id ='$user_id' AND products_id= '$id'";
    $run4 = execute_query($sql4);
    $row4 = mysqli_fetch_array($run4);
    header("Location: cart.php");
}

if (isset($_POST['-'])) {
    $id=$_POST['id'];
    $sql4= "UPDATE cart SET products_quantity = products_quantity - 1
    WHERE user_id ='$user_id' AND products_id= '$id'";
    $run4 = execute_query($sql4);
    $row4 = mysqli_fetch_array($run4);
    header("Location: cart.php");
}

?>

<style>
    input[type="number"] {
        width: 25px;
    }
    *{
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    }
</style>

<body>
    <!--  -->
    <div class="container" style="margin-left: 14%;">
        <h2 style="color: orange; margin-left: 35%;font-size: revert;">Cart Detail</h2>

        <table border="1px" style="color: black ;">
            <tr>
                <th>NO</th>
                <th>Product Name</th>
                <th>Product Image</th>
                <th>Unit Price</th>
                <th>Amount</th>
                <th>Price</th>
                <th colspan="2"></th>
            </tr>

            <!-- Get data from databse to store in table -->

            <?php
            if ($_SESSION['check'] == 0) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $phone = $_POST['phone'];
                $note = $_POST['note'];
                $no = 1;
                $total = 0;
                while ($cart = mysqli_fetch_array($run)) {

            ?>

                    <tr>
                        <td><?= $no++; ?></td>

                        <td><?= $cart['products_name'] ?></td>

                        <td><img src="image/<?= $cart['products_image'] ?>" alt="" width="150" height="100"></a></td>

                        <td><?= $cart['products_price'] . "$" ?></td>

                        <td>

                            <form action="" method="POST">
                                <input type="hidden" value="<?= $cart['products_id'] ?>" name="id">
                                <input name="+" value="+" type="submit" class="update">
                            </form>
                            <form action="" method="POST">
                            <input type="hidden" name="current_quantity" value="<?=$cart['products_quantity'] ?>">
                            <input type="number" min="0" size="2px" max="10" readonly value="<?= $cart['products_quantity'] ?>" name="current_quantity" size="2">
                            </form>
                            <form action="" method="POST">
                                <input name="-" value="-" type="submit" class="update">
                                <input type="hidden" value="<?= $cart['products_id'] ?>" name="id">
                            </form>

                        </td>

                        <td><?= $cart['products_price'] * $cart['products_quantity'] . "$" ?></td>

                        <td><a href="cart.php?action=delete&id=<?= $cart['products_id'] ?>"><i class="fa fa-trash-o"></i></a></td>
                    </tr>
            <?php
                    $no++;
                    $total += $cart['products_price'] * $cart['products_quantity'];
                    $_SESSION['total_price'] = $total;
                }
            }  ?>
            <tr>
                <td>&nbsp;</td>
                <td>Total Price</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td>&nbsp;</td>
                <td><?= $total . "$" ?></td>

            </tr>

        </table>
        <br><br>
        <form action="" method="POST">
            <input type="submit" value="Solve" style="background-color: #eb3349; color: white;font-size: 20px;margin-left:60%;" name="buy_all">
        </form>
    </div>
</body>