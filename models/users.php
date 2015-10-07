<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 05.10.2015
 * Time: 13:26
 */

/**
 * @param $link MongoClient
 * @param $login
 * @return boolean true|false
 */
function is_user_contain($link, $login) {
    $collection = $link->blog->users;

    //убираем лишние пробелы
    $login = trim($login);

    //ищем такой логин в коллекции
    $document = $collection->findOne(["login" => $login]);

    //находим - true
    return ($document == null) ? false : true;
}

/**
 * @param $link MongoClient
 * @param $firstname
 * @param $lastname
 * @param $login
 * @param $password
 */
function add_user($link, $firstname, $lastname, $login, $password) {
    $collection = $link->blog->users;

    //убираем лишние пробелы
    $firstname = trim($firstname);
    $lastname = trim($lastname);
    $login = trim($login);
    $password = trim($password);

    //формируем документ
    $document = [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "login" => $login,
        "password" => $password
    ];

    //вставляем в коллекцию
    $collection->insert($document);
}

/**
 * @param $link MongoClient
 * @param $login
 * @param $password
 * @return boolean true|false
 */
function check_password($link, $login, $password) {
    $collection = $link->blog->users;

    $login = trim($login);
    $password = trim($password);

    //ищем пользователя с таким паролем в коллекции
    $document = $collection->findOne(["login" => $login, "password" => $password]);

    //находим - true
    return ($document == null) ? false : true;
}

/**
 * @param $link MongoClient
 * @param $login
 */
function get_user($link, $login) {
    $collection = $link->blog->users;

    $login = trim($login);

    $document = $collection->findOne(["login" => $login]);

    return ($document == null) ? null : $document;
}

function user_exit($login) {

}