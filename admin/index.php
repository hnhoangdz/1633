<?php
require_once 'functions.php';
//start 1 session mới 
session_start();

//hàm isset dùng để kiểm tra xem biến đã khởi tạo chưa
if (isset($_POST['username'])) {
//tạo 2 biến $username & $password để nhận thông tin từ form login
$username = $_POST['username'];
$password = $_POST['password'];
$token = encrypt_password($password);
//$password = md5($password); //mã hóa ký tự nhập vào bằng MD5
//tạo query để truy vấn bảng user
$qry = "SELECT * FROM user WHERE username = '$username' AND passwordd = '$token'";
/* hiển thị kết quả truy vấn
tạo biến result để lưu kết quả truy vấn
gọi hàm querySQL từ file functions.php */
$result = execute_query($qry);
/* $row dùng để lưu kết quả truy vấn vào array (nếu có)
Lưu ý: mysqli_fetch_array là cú pháp */
$row = mysqli_fetch_array($result);
if (is_array($row)) {  
//khởi tạo 2 biến session cho username & password
$_SESSION['username'] = $username; 
} else { ?>
   <script type="text/javascript">
   	  alert("Login failed !");
   	  window.location.href = "index.php"
   </script>
<?php } } 
//check nếu người dùng đã login thì sẽ direct thẳng vào trang home
if (isset($_SESSION['username'])) {
   header("Location: home.php");
}
?>

<body style="background-image: url(image/background.jpg); background-repeat: no-repeat; background-size: 100% 145%;">
  <div id="login" style="height: 300px; background-color: grey; width: 300px; margin-left: 37%; margin-top: 10%;">
    <center>
      <a href="index.php"><img src="image/mainlogo.png" alt="" width="50%"></a> 
      <form class="frm" action="" method="POST">
        <fieldset>
          <legend>Login here</legend>
          <input type="text" name="username" placeholder="Admin" required=""> <br> <br>
          <input type="password" name="password" placeholder="Password" required=""> <br> <br>
          <input type="submit" id="inp_login" name="login" value="Login">
          <br><br>
        </fieldset>
      </form>
    </center>
  </div>
</body>