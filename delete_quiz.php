<?php
    include ("./connection.php");
    
    $quiz_id = $_GET['id'] ?? null;
    if (!$quiz_id) {
        echo 'error' => 'Quiz ID is required';
        exit;
    }
    $stmt = $pdo->prepare("DELETE FROM quizzes WHERE id = ?");
    $stmt->execute([$quiz_id]);
    echo 'message' => 'Quiz deleted';
?>