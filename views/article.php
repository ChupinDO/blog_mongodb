<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
<div class="container">
    <h1>Блог Даниила Чупина</h1>
    <a href="admin"><h3>Панель администратора</h3></a>
    <ol class="breadcrumb">
        <li><a href="index.php">Главная страница</a></li>
        <li class="active"><?=$article["title"]?></li>
    </ol>
    <div>
        <div class="article">
            <h3><?=$article["title"]?></h3>
            <em>Опубликовано: <?=$article["date"]?></em>
            <p><?=$article["content"]?></p>
        </div>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>