<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 02.10.2015
 * Time: 16:30
 */

require_once("database.php");
require_once("models/articles.php");

$link = db_connect();

$articles = articles_get_all($link);

$count = count($articles);

db_close_connection($link);

include("views/articles.php");