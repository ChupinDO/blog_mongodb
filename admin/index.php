<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 03.10.2015
 * Time: 14:03
 */

require_once("../DBClient.php");
require_once("../models/ArticlesCollection.php");

$link = DBClient::connect();

$articles_collection = new ArticlesCollection($link);

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

            $articles_collection->add($article);

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
        $articles_collection->delete($id);

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

            $articles_collection->edit($id, $new_article);

            header("Location: index.php");
        }

        $article = $articles_collection->get_one($id);

        include("../views/article_admin.php");

        break;
    }

    default: {
        $articles = $articles_collection->get_all();

        include("../views/articles_admin.php");
    }
}

//в завершении любой операции закрывам соединение
DBClient::close($link);


