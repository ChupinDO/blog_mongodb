<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <script src="models/jquery-2.1.4.min.js"></script>

    <style>
        .panel {
            width: 60%;
        }

        .form-group {
            width: 40%;
        }
        textarea {
            resize: vertical;
        }
    </style>
</head>
<body>
<div class="container">

    <?php if(empty($_SESSION["login"])) : ?>

        <p><div class="btn-group pull-right" role="group" aria-label="...">
            <a role="button" class="btn btn-default" href="authorization">Вход</a>
            <a role="button" class="btn btn-default" href="registration">Регистрация</a>
        </div></p>

    <?php else: ?>

        <p><div class="btn-group pull-right" role="group" aria-label="...">
            <a role="button" class="btn btn-success" href="#">Здравствуйте, <?=$_SESSION["firstname"]?></a>
            <a role="button" class="btn btn-default" href="authorization/index.php?action=exit">Выход</a>
        </div></p>

    <?php endif; ?>

    <div class="page-header">
        <h1><a href="./">Блог Даниила Чупина</a></h1>
    </div>

    <ol class="breadcrumb">
        <li><a href="./">Главная страница</a></li>
        <li class="active"><?=$article["title"]?></li>
    </ol>
    <div>
        <div class="article">
            <h3><?=$article["title"]?></h3>
            <em>Опубликовано: <?=$article["date"]?></em>
            <p><?=$article["content"]?></p>
        </div>
    </div>

    <?php if(!empty($_SESSION["login"])): ?>

        <form method="post" action="article.php">
            <div class="form-group">
                <label for="inputTitle">Заголовок</label>
                <input type="text" id="inputTitle" name="title" class="form-control" placeholder="Заголовок комментария..." maxlength="100" required>
            </div>

            <div class="form-group">
                <label for="inputText">Комментарий</label>
                <textarea name="message" id="inputText" class="form-control" placeholder="Текст комментария..." required></textarea>
            </div>

            <div class="form-group">
                <span id="counter" class="label label-success pull-right">1000</span>
            </div> <br>

            <div class="form-group">
                <input type="submit" value="Отправить" class="form-control btn btn-primary">
            </div>

            <input type="text" name="id" value="<?=$_GET["id"]?>" hidden>
            <input type="text" name="from" value="<?=$_SESSION["login"]?>" hidden>
        </form> <br>

    <?php else: ?>

        <div class="alert alert-warning">
            <span>Чтобы оставить комментарий, <a href="authorization">войдите в систему</a> или <a href="registration">зарегистрируйтесь</a>.</span>
        </div>

    <?php endif; ?>

    <?php if($comments == null): ?>

        <div class="alert alert-info" role="alert">
            <span>Комментарии к данной статье отсутствуют.</span>
        </div>

    <?php else: ?>

        <h3>Комментарии <span class="label label-success"><?=$count ?></span></h3>

    <?php foreach($comments as $key=>$value): ?>

            <div class="panel panel-info">
                <div class="panel-heading">

                    <?php
                        if(!empty($_SESSION["login"])):
                        if($_SESSION["login"] == $value["from"]):
                    ?>

                        <a href="article.php?id=<?=$_GET["id"]?>&action=delete&comment_id=<?=$value["_id"]?>" class="glyphicon glyphicon-remove pull-right" aria-hidden="true"></a>

                    <?php
                        endif;
                        endif;
                    ?>

                    <h3 class="panel-title"><?=$value["title"]?></h3>
                    <em>Опубликовано: <?=$value["from"]?>, <?=$value["saved_at"]?></em>
                </div>

                <div class="panel-body">
                    <?=$value["message"]?>
                </div>
            </div>

    <?php
        endforeach;
        endif;
    ?>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>

    <script>
        $("textarea").keyup(function() {
            var textarea = this;

            if (textarea.value.length > 1000) {
                textarea.value = textarea.value.substr(0, 1000);
            }

            $("#counter").html(1000 - textarea.value.length);
        });
    </script>
</div>
</body>
</html>