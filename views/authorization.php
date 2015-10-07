<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">

    <script type="text/javascript" src="../models/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../models/script.js"></script>
</head>
<body>
<div class="container">
    <h1>Блог Даниила Чупина</h1>
    <a href="../admin"><h3>Панель администратора</h3></a>

    <ol class="breadcrumb">
        <li><a href="../index.php">Главная страница</a></li>
        <li class="active">Вход</li>
    </ol>

    <div>
        <form name="form" method="post" action="">

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon3">Логин</span>
                <input type="text" name="login" class="form-control" placeholder="Введите ваш логин..." aria-describedby="basic-addon3" autofocus required>
            </div> <br>

            <div class="input-group">
                <span class="input-group-addon" id="basic-addon4">Пароль</span>
                <input type="password" name="password" class="form-control" placeholder="Введите ваш пароль..." aria-describedby="basic-addon4" required>
            </div> <br>

            <input type="submit" value="Войти" class="btn btn-primary">
        </form>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>