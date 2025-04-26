<?php
    $host = 'localhost'; // Change this to your database host
    $user = 'root'; // Change this to your database username
    $pass = ''; // Change this to your database password
    $db = 'testdb'; // Change this to your database name

    try {
        $pdo = new PDO("mysql:host=$host;db=$db;charset=utf8", $user, $pass);
        echo 'Successfully connected to the database!';
    } catch (PDOException $e) {
        echo 'Connection failed: ' . $e->getMessage();
        exit;
    }
?>