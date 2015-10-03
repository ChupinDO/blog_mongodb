<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 03.10.2015
 * Time: 14:03
 */

require_once("../database.php");
require_once("../models/articles.php");

$link = db_connect();

//проверка, установлен ли параметр action
if (isset($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "";
}

switch ($action) {
    case "add": {
        if (!empty($_POST)) {
            $article = ["date" => $_POST["date"], "title" => $_POST["title"], "content" => $_POST["content"]];
            article_add($link, $article);

            header("Location: index.php");
        }

        $article = ["date" => "", "title" => "", "content" => ""];
        include("../views/article_admin.php");
        break;
    }

    case "delete": {
        //получаем параметр id
        $id = $_GET["id"];
        //удаляем статью из базы
        article_delete($link, $id);

        //перенаправляем браузер на index.php
        header("Location: index.php");

        break;
    }

    case "edit": {
        $id = $_GET["id"];

        if (!empty($_POST)) {
            $new_article = [
                "date" => $_POST["date"],
                "title" => $_POST["title"],
                "content" => $_POST["content"]
            ];
            article_edit($link, $id, $new_article);

            header("Location: index.php");
        }

        $article = article_get_one($link, $id);

        include("../views/article_admin.php");

        break;
    }

    default: {
        $articles = articles_get_all($link);

        include("../views/articles_admin.php");
    }
}

//в завершении любой операции закрывам соединение
db_close_connection($link);


