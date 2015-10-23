<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 04.10.2015
 * Time: 18:13
 */

//точка входа для процедуры регистрации

//класс для работы с базой данных
require_once("../DBClient.php");
//класс для работы с пользователями
require_once("../models/UsersCollection.php");

if (empty($_POST)) {
    //если никаких данных не передано - подгружаем view
    include("../views/registration.php");
} else {
    $link = db_connect();

    //TODO обработка входных данных

    //приводим к строчным символам
    $login = mb_strtolower($_POST["login"]);

    //проверяем, есть ли такой пользователь в базе
    //проверка идет по логину
    if( is_user_contain($link, $login) ) {
        echo "Извините, введенный вами логин уже зарегистрирован. Введите другой логин. <br>";
        echo "Вы будете перенаправлены на страницу регистрации через 5 секунд.";

        //перенаправляем на страницу регистрации через 5 секунд
        header('refresh: 5; url=index.php');

    } else {
        //шифрование пароля
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        add_user($link, $_POST["firstname"], $_POST["lastname"], $login, $password, $_POST["email"]);

        echo "Вы успешно зарегистрированы! <br>";
        echo "Вы будете перенаправлены на главную страницу через 5 секунд.";
        header('refresh: 5; url=../index.php');
    }
    //закрываем соединение с базой
    db_close_connection($link);
}