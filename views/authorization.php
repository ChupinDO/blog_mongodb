<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">

    <script type="text/javascript" src="../models/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../models/script.js"></script>

    <style>
        .form-control {
            width: 40%;
        }
    </style>
</head>
<body>
<div class="container">

    <div class="page-header">
        <h1>Блог Даниила Чупина</h1>
    </div>

    <ol class="breadcrumb">
        <li><a href="../index.php">Главная страница</a></li>
        <li class="active">Вход</li>
    </ol>

        <form method="post" action="">

            <div class="form-group">
                <label>Логин</label>
                <input type="text" name="login" class="form-control" placeholder="Введите ваш логин..." autofocus required>
            </div>

            <div class="form-group">
                <label>Пароль</label>
                <input type="password" name="password" class="form-control" placeholder="Введите ваш пароль..." required>
            </div>

            <input type="submit" value="Войти" class="form-control btn btn-primary">
        </form> <br>

    <a href="../registration"><h4>Регистрация</h4></a>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>
</div>
</body>
</html>