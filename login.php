<!-- this is to require user login or register -->

<?php
require_once "functions.php";

session_start();

if (isset($_POST['username'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $encrypt = encrypt_password($password);

  $sql = "SELECT * FROM user 
  WHERE username = '$username' AND passwordd = '$encrypt'";
  $run = execute_query($sql);
  $row = mysqli_fetch_array($run);
  $_SESSION['user_id'] = $row[0];
  // var_dump($_SESSION['user_id']);
  // exit;

  if (is_array($row)) {
    $_SESSION['username'] = $username;
    // var_dump($_SESSION['name']);
    // exit;
    // var_dump($_SESSION['username']); exit;
    $_SESSION['password'] = $password;
    $_SESSION['role'] = $row['role'];
    $_SESSION['id'] = $row['user_id'];
    if ($row['role'] == 'admin') { ?>
      <script>
        alert("Login successful!");
        window.location.href = "admin/home.php";
      </script>
    <?php } else { ?>
      <script>
        alert("Login successful!");
        window.location.href = "index.php";
      </script>
    <?php }
  } else { ?>
    <script type="text/javascript">
      alert("Login failed!");
      window.location.href = "";
    </script>
<?php }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title></title>
</head>


<body style="background-image: url(image/background.jpg); background-repeat: no-repeat; background-size: 100% 145%;">
  <div id="login" style="height: 300px; background-color: grey; width: 300px; margin-left: 37%; margin-top: 10%;">
    <center>
      <a href="index.php"><img src="image/mainlogo.png" alt="" width="50%"></a> 
      <form class="frm" action="" method="POST">
        <fieldset>
          <legend>Login here</legend>
          <input type="text" name="username" placeholder="Username" required=""> <br> <br>
          <input type="password" name="password" placeholder="Password" required=""> <br> <br>
          <input type="submit" id="inp_login" name="login" value="Login">
          <br><br>
          <a href="register.php">Don't have account?</a>
        </fieldset>
      </form>
    </center>
  </div>
</body>

</html>