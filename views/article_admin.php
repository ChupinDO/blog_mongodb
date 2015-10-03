<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<div class="container">
    <h1>Блог Даниила Чупина</h1>
    <h3>Панель администратора</h3>
    <ol class="breadcrumb">
        <li><a href="../index.php">Главная страница</a></li>
        <li><a href="index.php">Панель администратора</a></li>
        <li class="active">Редактор статей</li>
    </ol>
    <div>
        <form name="form" method="post" action="index.php?action=<?=$_GET["action"]?>&id=<?=$_GET["id"]?>">
            <div class="input-group">
                <span class="input-group-addon" id="basic-addon1">Заголовок статьи</span>
                <input type="text" name="title" value="<?=$article["title"]?>" class="form-control" placeholder="Введите заголовок статьи..." aria-describedby="basic-addon1" autofocus required>
            </div> <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon2">Дата публикации</span>
                <input type="date" name="date" value="<?=$article["date"]?>" class="form-control" aria-describedby="basic-addon2" required>
            </div> <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">Текст статьи</span>
                <textarea name="content" class="form-control" placeholder="Введите текст статьи..." aria-describedby="basic-addon" rows="10" required><?=$article["content"]?></textarea>
            </div> <br>
            <input type="submit" value="Сохранить" class="btn btn-primary">
        </form>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>