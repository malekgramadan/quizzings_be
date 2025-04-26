<?php
    include ("./connection.php");

    $stmt = $pdo->query("SELECT q.*, u.username as author FROM quizzes q JOIN users u ON q.user_id = u.id");
    $quizzes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($quizzes);
?>