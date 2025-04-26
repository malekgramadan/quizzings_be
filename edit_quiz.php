<?php
    include ("./connection.php");
    
    $input = json_decode(file_get_contents('php://input'), true);
    if (empty($input['quiz_id']) || empty($input['title'])) {
        echo 'error' => 'Quiz ID and title are required';
        exit;
    }
    $stmt = $pdo->prepare("UPDATE quizzes SET title = ?, description = ? WHERE id = ?");
    $stmt->execute([$input['title'], $input['description'] ?? '', $input['quiz_id']]);
    echo 'message' => 'Quiz updated';
?>