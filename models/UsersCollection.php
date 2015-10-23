<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 05.10.2015
 * Time: 13:26
 */


class UsersCollection
{
    /**
     * @var MongoClient
     */
    private $link;

    /**
     * @var MongoCollection
     */
    private static $collection;

    /**
     * @param $link MongoClient
     */
    public function __construct($link) {
        $this->link = $link;

        //коллекция пользователей
        UsersCollection::$collection = $link->blog->users;
    }

    /**
     * @param $login
     * @return boolean true|false
     */
    public function is_contain($login)
    {
        //убираем лишние пробелы
        $login = trim($login);

        //ищем такой логин в коллекции
        $document = UsersCollection::$collection->findOne(["login" => $login]);

        //находим - true
        return ($document == null) ? false : true;
    }

    /**
     * @param $firstname
     * @param $lastname
     * @param $login
     * @param $password
     */
    public function add($firstname, $lastname, $login, $password, $email)
    {
        //TODO инкапсулировать в метод и обработать данные понадежнее
        //убираем лишние пробелы
        $firstname = trim($firstname);
        $lastname = trim($lastname);
        $login = trim($login);
        $password = trim($password);
        $email = trim($email);

        //формируем документ
        $document = [
            "firstname" => $firstname,
            "lastname" => $lastname,
            "login" => $login,
            "password" => $password,
            "email" => $email
        ];

        //вставляем в коллекцию
        UsersCollection::$collection->insert($document);
    }

    /**
     * @param $login
     * @param $password
     * @return boolean true|false
     */
    public function check_password($login, $password)
    {
        $login = trim($login);
        $password = trim($password);

        //ищем пользователя с таким паролем в коллекции
        $document = UsersCollection::$collection->findOne(["login" => $login]);

        //если такой пользователь есть и пароли совпадают - true
        return ($document != null && password_verify($password, $document["password"])) ? true : false;
    }

    /**
     * @param $login
     */
    public function get_one($login)
    {
        $login = trim($login);

        $document = UsersCollection::$collection->findOne(["login" => $login]);

        return ($document == null) ? null : $document;
    }

    function user_exit($login)
    {

    }
}