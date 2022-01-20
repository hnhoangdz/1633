<!-- this file is to require admin must login before go to homepage management -->
<?php
//khởi tạo session
session_start();
//check if user did not login
if (!isset($_SESSION['username']) && !isset($_SESSION['password'])) {
    header("Location: index.php");
}
?>