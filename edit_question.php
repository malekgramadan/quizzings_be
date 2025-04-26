<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    if (empty($input['question_id'])) {
        echo 'error' => 'Question ID is required';
        exit;
    }
    $stmt = $pdo->prepare("UPDATE questions SET 
        question_text = ?,
        option_a = ?,
        option_b = ?,
        option_c = ?,
        correct_answer = ?
        WHERE id = ?");

    $stmt->execute([
        $input['question_text'],
        $input['option_a'],
        $input['option_b'],
        $input['option_c'],
        $input['correct_answer'],
        $input['question_id']
    ]);
    echo 'message' => 'Question updated';
?>