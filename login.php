<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("SELECT id, username, password FROM users WHERE email = ?");
    $stmt->execute([$input['email']]);
    $user = $stmt->fetch();
    if (!$user || !password_verify($input['password'], $user['password'])) {
        echo 'error' => 'Invalid credentials';
        exit;
    }
    unset($user['password']);
    echo 'message' => 'Login successful', 'user' => $user;
?>