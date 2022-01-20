<!-- this is to require user login or register -->


<?php
require_once "functions.php";

session_start();

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone = $_POST['phone']; 
    $encrypt = encrypt_password($password);

    // check if existed account
    $sql1 = "SELECT * FROM user WHERE username = '$username'";
    $run1 = execute_query($sql1);

    if($run1->num_rows>0){
        echo "This username existed <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }

    // check if user register username = admin
    if($username == "admin"){
        echo "This username can not be assigned <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }
    // check name
    if (!preg_match("/^[a-z]*$/i", $name)) {
        echo  "This name is not right <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }

    // check email
    $sql2 = "SELECT * FROM user WHERE email = '$email'";
    $run2 = execute_query($sql2);
    if ($run2->num_rows > 0) {
        echo  "This email existed <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }

    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)) {
        echo "Wrong email <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }

    // check phone
    $sql4 = "SELECT * FROM user WHERE phone = '$phone'";
    $run4 = execute_query($sql4);

    if($run4->num_rows >0){
        echo  "This phone number existed <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }

    if (!preg_match("/^[091]/", $phone) or !preg_match("/^[034]/", $phone)) {
        echo "Wrong phonenumber <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    }
    if ($run->num_rows > 0) {
        echo "This account existed <a href='javascript: history.go(-1)'>Back</a>";
        exit;
    } else {
        $sql3 = "INSERT INTO `user` (`user_id`, `username`, `name`, `phone`, `email`, `address`, `passwordd`, `role`) VALUES (NULL, '$username', '$name', '$phone', '$email', '$address', '$encrypt', 'customer');";
        $run3 = execute_query($sql3);
        $row3 = mysqli_fetch_array($run3);
        // var_dump($run3);exit;
        $_SESSION['name'] = $name;
        $_SESSION['phone'] = $phone;
        $_SESSION['email'] = $email;
        $_SESSION['address'] = $address;
        ?>
        <script>
            alert("Register successful");
            window.location.href = "login.php";
        </script>
<?php } } ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body style="background-image: url(image/background.jpg); background-repeat: no-repeat; background-size: 100% 145%;">
    <div style=" margin-left:40%; height: 500px; background-color: grey; width: 300px">
        <img src="image/mainlogo.png" style="margin-left: 80px;" alt="" width="50%">
        <form class="frm" action="register.php" method="POST">
            <fieldset>
                <legend style="font-size: 200%; text-align: center;">Register</legend>
                <tr>
                    <td>Username:</td>
                    <td><input type="text" name="username" id="username" required maxlength="32" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <td>Name:</td>
                    <td><input type="text" name="name" id="name" required maxlength="50" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <td>Phone:</td>
                    <td><input type="text" name="phone" id="phone" required maxlength="10" required minlength="10" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <td>Email:</td>
                    <td><input type="text" name="email" id="email" required maxlength="50" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <td>Address:</td>
                    <td><input type="text" name="address" id="address" required maxlength="1000" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <td>Password:</td>
                    <td><input type="password" name="password" id="password" required maxlength="32" required=""> </td>
                </tr>
                <br><br>
                <tr>
                    <input style="margin-left: 40%;" type="submit" value="Register" name="register">
                </tr>
            </fieldset>
        </form>
    </div>
</body>

</html>