<?php
//запускаем сессию
session_start();

//точка входа для процедуры авторизации

//класс для работы с базой данных
require_once("../database.php");
//класс для работы с пользователями
require_once("../models/users.php");

//TODO подумать над тем, чтобы объединить скрипты авторизации и регистрации и обрабатывать данные через различные action

if (!empty($_GET["action"])) {
    $action = $_GET["action"];

    switch($action) {
        case "exit":
            //TODO нужно ли инкапсулировать строку ниже в метод user_exit()?
            unset($_SESSION["login"]);
            unset($_SESSION["id"]);
            unset($_SESSION["firstname"]);
            header("Location: ../index.php");
            die;
            break;
    }
}

if (empty($_POST)) {
    //если никаких данных не передано - подгружаем view
    include("../views/authorization.php");
} else {
    $link = db_connect();

    //TODO обработка входных данных

    //приводим к строчным символам
    $login = mb_strtolower($_POST["login"]);

    //проверяем входные данные
    if (check_password($link, $login, $_POST["password"])) {
        //получаем запись данного пользователя
        $user = get_user($link, $login);

        //записываем в сессию нужные данные
        //TODO подумать нужно ли таскать другие данные + инкапсулировать в метод user_enter?
        $_SESSION["firstname"] = $user["firstname"];
        $_SESSION["login"] = $user["login"];
        $_SESSION["id"] = $user["_id"];

        /*
        echo "Вы успешно зашли на сайт! <br>";
        echo "Вы будете перенаправлены на главную страницу через 5 секунд.";

        header('refresh: 5; url=../index.php');
        */

        header("Location: ../index.php");
    } else {
        echo "Ошибка! Проверьте правильность введенных данных. <br>";
        echo "Вы будете перенаправлены на страницу входа через 5 секунд.";

        header('refresh: 5; url=index.php');
    }
    //закрываем соединение с базой
    db_close_connection($link);
}