<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 03.10.2015
 * Time: 16:05
 */

require_once("DBClient.php");
require_once("models/ArticlesCollection.php");
require_once("models/CommentsCollection.php");

$link = DBClient::connect();

$articles_collection = new ArticlesCollection($link);

$article = $articles_collection->get_one($_GET["id"]);

$comments_collection = new CommentsCollection($link);

$comments = $comments_collection->get_all_for_article($_GET["id"]);

$comments = array_reverse($comments, true);

$count = count($comments);

if (!empty($_GET["action"])) {
    $action = $_GET["action"];

    switch($action) {
        case "delete":
            $comments_collection->delete($_GET["comment_id"]);

            header("Location: article.php?id=" . $_GET["id"]);

            DBClient::close($link);

            die;
            break;
    }
}

if (empty($_POST)) {
    include("views/article.php");
} else {
    $comments_collection->add($_POST["from"], $_POST["title"], $_POST["message"], $_POST["id"]);

    header("Location: article.php?id=" . $_POST["id"]);
}

DBClient::close($link);
