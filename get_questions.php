<?php
    include ("./connection.php");

    $quiz_id = $_GET['quiz_id'] ?? null;
    if (!$quiz_id) {
        echo 'error' => 'Quiz ID is required';
        exit;
    }
    $stmt = $pdo->prepare("SELECT * FROM questions WHERE quiz_id = ?");
    $stmt->execute([$quiz_id]);
    $questions = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($questions);
?>