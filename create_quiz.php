<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    if (empty($input['user_id']) || empty($input['title'])) {
        echo 'error' => 'User ID and title are required';
        exit;
    }
    $stmt = $pdo->prepare("INSERT INTO quizzes (user_id, title, description) VALUES (?, ?, ?)");
    $stmt->execute([$input['user_id'], $input['title'], $input['description'] ?? '']);
    echo 'quiz_id' => $pdo->lastInsertId(), 'message' => 'Quiz created';
?>