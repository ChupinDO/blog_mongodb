<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 03.10.2015
 * Time: 16:05
 */

require_once("database.php");
require_once("models/articles.php");

$link = db_connect();
$article = article_get_one($link, $_GET["id"]);

db_close_connection($link);

include("views/article.php");