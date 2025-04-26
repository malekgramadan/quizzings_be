<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    // Validate input
    if (empty($input['username']) || empty($input['email']) || empty($input['password'])) {
        echo 'error' => 'All fields are required';
        exit;
    }
?>