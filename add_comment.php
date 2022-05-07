<?php
require_once('helpers.php');
require_once('auth.php');

$connect = db_set_connection();
$errors = [];
$min_length = 4;
$referer = $_SERVER['HTTP_REFERER'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $post_id = filter_input(INPUT_POST, 'post_id') ?? null;
    $comment = trim(filter_input(INPUT_POST, 'comment')) ?? null;
    if (!$post_id) {
        http_response_code(404);
        die('Такой страницы не существует!');
    }
    $sql_post_check = "SELECT id, user_id FROM post WHERE id = '$post_id'";
    $post_check = db_get_query('assoc', $connect, $sql_post_check) ?? null;
    if (!$post_check) {
        http_response_code(404);
        die('Такой страницы не существует!');
    }
    $post_author_id = $post_check['user_id'];
    $errors['comment'] = validateFilled($comment);
    if (empty($errors['comment'])) {
        $errors['comment'] = validateLength($comment, $min_length);
    }

    if (empty($errors['comment']) && $post_id) {
        mysqli_query($connect, "START TRANSACTION");
        $add_comment = mysqli_query($connect, "INSERT INTO comments (comment, user_id, post_id) VALUES ('$comment', '$user_id', '$post_id')");
        if ($add_comment) {
            mysqli_query($connect, "COMMIT");
        }
        else {
            mysqli_query($connect, "ROLLBACK");
        }
        header("Location: /profile.php?user_id=$post_author_id&tab=posts");
        exit;
    }
}
