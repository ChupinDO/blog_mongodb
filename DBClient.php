<?php
/**
 * Created by PhpStorm.
 * User: ������
 * Date: 02.10.2015
 * Time: 16:19
 */

/**
 * Инкапсуляция методов подключения к СУБД MongoDB
 */
class DBClient
{
    /**
     * @return MongoClient
     */
    public static function connect()
    {
        try {
            $link = new MongoClient();
        } catch (MongoConnectionException $ex) {
            die("MongoDB connection error #: " . $ex->getMessage() . ".\n Please check the connection with database!");
        }

        return $link;
    }

    /**
     * @param $link MongoClient
     */
    public static function close($link)
    {
        $link->close();
    }
}

