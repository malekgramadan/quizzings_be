<?php
    include ("./connection.php");

    $input = json_decode(file_get_contents('php://input'), true);
    $required = ['quiz_id', 'question_text', 'option_a', 'option_b', 'option_c','correct_answer'];
    foreach ($required as $field) {
        if (empty($input[$field])) {
            echo 'error' => "$field is required";
            exit;
        }
    }
    $stmt = $pdo->prepare("INSERT INTO questions (quiz_id, question_text, option_a, option_b, option_c, correct_answer) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([
        $input['quiz_id'],
        $input['question_text'],
        $input['option_a'],
        $input['option_b'],
        $input['option_c'],
        $input['correct_answer']
    ]);
    echo 'question_id' => $pdo->lastInsertId(), 'message' => 'Question added';
?>