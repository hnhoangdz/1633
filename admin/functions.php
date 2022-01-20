<?php

// đoạn code để thực hiện kết nối đến database
// khai báo tham số để kết nối đến database
$host_name = "localhost";
$db_name = "snackyluxcar";
$db_username = "root";
$db_password = "root";
$db_port = "3306";
// tạo kết nối đến MySQL bằng phương pháp MySQLi
$db_connection = new mysqli($host_name,$db_username,$db_password,$db_name,$db_port);

// tạo function để thực thi câu lệnh SQL
function execute_query($sql){
    global $db_connection;
    return $db_connection->query($sql);
}

// function để mã hóa mật khẩu
function encrypt_password($pass){
    return md5($pass);
}