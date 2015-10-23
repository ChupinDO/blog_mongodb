<!DOCTYPE html>
<html>
<head>
    <title>Блог Даниила Чупина</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../styles/style.css">

    <script type="text/javascript" src="../models/jquery-2.1.4.min.js"></script>

    <style>
        .form-group {
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
        <li class="active">Регистрация</li>
    </ol>

    <div class="center-block">
        <form name="form" method="post" action="index.php">
            <div class="form-group">
                <label for="inputName">Имя</label>
                <input type="text" id="inputName" name="firstname" class="form-control" placeholder="Введите ваше имя..." autofocus required pattern="[а-яА-ЯA-Za-z]+">
            </div>

            <div class="form-group">
                <label for="inputLastname">Фамилия</label>
                <input type="text" id="inputLastname" name="lastname" class="form-control" placeholder="Введите вашу фамилию..." required pattern="[а-яА-ЯA-Za-z]+">
            </div>

            <div class="form-group">
                <label for="inputEmail">Электронная почта</label>
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Введите вашу электронную почту..." required>
            </div>

            <div class="form-group">
                <label for="login">Логин</label>
                <input type="text" id="login" name="login" class="form-control" placeholder="Введите ваш логин..." required pattern="^[a-zA-Z][a-zA-Z0-9-_\.]{1,15}$">
            </div>

            <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" id="password" name="password"
                       class="form-control" placeholder="Введите ваш пароль..."
                       required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
                <p>
                    <h6>
                        Пароль должен содержать от 8 до 16 символов,
                        включая, как минимум, одну строчную букву,
                        одну заглавную букву и одну цифру.
                    </h6>
                </p>
            </div>

            <div class="form-group">
                <label for="confirmation">Подтверждение</label>
                <input type="password" id="confirmation" name="confirmation"
                       class="form-control" placeholder="Введите подтверждение пароля..."
                       required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$">
            </div>

            <div class="alert alert-warning hidden">
                <span>Такой логин уже занят! Пожалуйста, введите другой.</span>
            </div>

            <div class="alert alert-danger hidden">
                <span>Пароль и подтверждение не совпадают!</span>
            </div>

            <input type="submit" id="submit" value="Зарегистрироваться" class="btn btn-primary">
        </form>
    </div>

    <footer>
        <p>Блог Даниила Чупина <br>Copyright &copy; 2015</p>
    </footer>

    <script>
        $(document).ready(function() {

            $('#submit').bind('click blur', function(e) {
                var val1 = $('#password').val(),
                    val2 = $('#confirmation').val();

                if (val1 != val2) {
                    $('.alert-danger').removeClass('hidden');
                    e.preventDefault();
                } else {
                    $('.alert-danger').addClass('hidden');
                }
            });
            /*
                $.post("check_user_ajax.php", { login:$('#login').val() }, function(data) {
                    if (data == "true") {
                        $('.alert-warning').removeClass('hidden');
                        eventHandler.preventDefault();
                    } else {
                        $('.alert-warning').addClass('hidden');
                    }
                });
                */
        });
    </script>
</div>
</body>
</html>