<?php
/**
 * Created by PhpStorm.
 * User: ������
 * Date: 02.10.2015
 * Time: 16:19
 */

function db_connect() {
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
function db_close_connection($link) {
    $link->close();
}

