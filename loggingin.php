<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$input['email']]);
    $user = $stmt->fetch();
    if (!$user || !password_verify($input['password'], $user['password'])) {
        echo 'error' => 'Invalid credentials';
        exit;
    }
    session_start();
    $_SESSION['user_id'] = $user['id'];
    echo 'message' => 'Login successful';
?>