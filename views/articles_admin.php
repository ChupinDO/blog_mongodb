<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">
</head>
<body>
<div class="container">

    <div class="page-header">
        <h1>Блог Даниила Чупина</h1>
    </div>

    <h3>Панель администратора</h3>
    <ol class="breadcrumb">
        <li><a href="../index.php">Главная страница</a></li>
        <li class="active">Панель администратора</li>
    </ol>
    <a href="index.php?action=add">Добавить статью</a>
    <div>
        <?php
        if($articles == null)
        echo "Статей нет. <br>Для добавления нажмите 'Добавить статью'.";
        else {
        ?>
        <table class="table table-hover">

            <thead>
            <tr>
                <th>Дата</th>
                <th>Заголовок</th>
                <th>#</th>
                <th>#</th>
            </tr>
            </thead>

            <tbody>
                <?php foreach($articles as $key=>$value): ?>
                    <tr>
                        <td><?php echo $value["date"]?></td>
                        <td><?php echo $value["title"]?></td>
                        <td><a href="index.php?action=edit&id=<?=$value["_id"]?>">Редактировать</a></td>
                        <td><a href="index.php?action=delete&id=<?=$value["_id"]?>">Удалить</a></td>
                    </tr>
                <?php endforeach; } ?>
            </tbody>
        </table>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>