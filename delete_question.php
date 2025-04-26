<?php
    include ("./connection.php");

    $question_id = $_GET['id'];
    if (!$question_id) {
        echo 'error' => 'Question ID is required';
        exit;
    }
    $stmt = $pdo->prepare("DELETE FROM questions WHERE id = ?");
    $stmt->execute([$question_id]);
    echo 'message' => 'Question deleted';
?>