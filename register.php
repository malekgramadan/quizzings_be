<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    // Validate input
    if (empty($input['username']) || empty($input['email']) || empty($input['password'])) {
        echo 'error' => 'All fields are required';
        exit;
    }
    // Check existing user
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ? OR username = ?");
    $stmt->execute([$input['email'], $input['username']]);
    if ($stmt->fetch()) {
        echo 'error' => 'Email or username already exists';
        exit;
    }
    $hashedPassword = password_hash($input['password'], PASSWORD_DEFAULT);
    $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
    $stmt->execute([$input['username'], $input['email'], $hashedPassword]);
    echo 'message' => 'User registered successfully';
?>