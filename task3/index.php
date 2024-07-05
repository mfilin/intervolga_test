<?php
require_once('config.php');
use task3\Classes\Comment;

$comment = new Comment();
if (!empty($_POST['comment'])) {
    $comment->text = $_POST['text'];
    $comment->save();
}
$comments = $comment->findAll();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Blog</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <style>
            .comment-list {
                list-style-type: none;
                padding: 0;
                margin: 0;
            }

            .comment-item {
                border: 1px solid #ccc;
                padding: 10px;
                margin-bottom: 10px;
            }

            .comment-item h3 {
                margin: 0;
            }

            .comment-item p {
                margin: 5px 0;
            }

            .comment-form {
                margin-top: 20px;
            }

            .comment-form label {
                display: block;
                margin-bottom: 5px;
            }

            .comment-form input[type="text"] {
                width: 100%;
                padding: 5px;
                margin-bottom: 10px;
            }

            .comment-form button {
                padding: 10px 20px;
            }
        </style>
    </head>

    <body>

        <h1>Список комментариев</h1>

        <?php

        

        foreach ($comments as $row) :
        ?>
            <li class="comment-item">
                <h3>Comment <?= $row['id'] ?></h3>
                <p><?= $row['text'] ?></p>
            </li>

        <?php endforeach

        ?>

        <form class="comment-form" action="/add-comment" method="POST">
            <label for="comment">Комментарий:</label>
            <textarea id="comment" name="comment" required></textarea>
            <button type="submit">Добавить</button>
        </form>

        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script>
            $(function() {
                $('.qdate').datepicker({
                    dateFormat: "dd-mm-yy"
                });
            });
        </script>
    </body>

</html>