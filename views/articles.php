<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">

    <script type="text/javascript" src="models/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="models/script.js"></script>
</head>
<body>
<div class="container">

    <h1>Блог Даниила Чупина</h1>
    <a href="admin"><h3>Панель администратора</h3></a>
    <ol class="breadcrumb">
        <li class="active">Главная страница</li>
    </ol>

    <span>Всего статей в блоге: <span class="badge"><?=$count ?></span></span>

    <div>
        <?php
        if($articles == null)
            echo "Статей нет. <br>Для добавления воспользуйтесь панелью администратора";
        else {
        foreach($articles as $key=>$value):?>

        <div class="article panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title"><a href="article.php?id=<?=$value["_id"]?>"><?=$value["title"]?></a></h3>
                <em>Опубликовано: <?=$value["date"]?></em>
            </div>
            <div class="panel-body">
                <?=get_intro($value["content"]);?>
                <a href="article.php?id=<?=$value["_id"]?>">читать в отдельном окне</a>
            </div>
        </div>

        <?php endforeach; } ?>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>