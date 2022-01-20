<?php


// this file is to create connection to mysql database
// initialize elements to create databse
$host_name = "localhost";
$db_name = "snackyluxcar";
$db_username = "root";
$db_password = "root";
$db_port = "3306";

// create connection to database by function MySQLi
$db_connection = new mysqli($host_name,$db_username,$db_password,$db_name,$db_port);

// create function to call when need to using commands database 
function execute_query($sql){
    global $db_connection;
    return $db_connection->query($sql);
}

// create function to encrpt password by hash table
function encrypt_password($pass){
    return md5($pass);
}