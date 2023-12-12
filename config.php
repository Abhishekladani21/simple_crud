<?php

$hostname = "localhost";

$username = "root"; 

$password = ""; 

$dbname = "myform"; 

$conn = new mysqli($hostname, $username, $password);
if ($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === FALSE){
    die("Error creating database: " . $conn->error);
}

$conn->select_db($dbname);

$sql = "CREATE TABLE IF NOT EXISTS users (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `firstname` VARCHAR(100) NOT NULL,
    `lastname` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `password` INT(15) NOT NULL,
    `gender` varchar(256) NOT NULL
    )";
    if ($conn->query($sql) === FALSE){
        die("Error creating table: " . $conn->error);
    }
?> 