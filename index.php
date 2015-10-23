<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 02.10.2015
 * Time: 16:30
 */

require_once("DBClient.php");
require_once("models/ArticlesCollection.php");

$link = DBClient::connect();

$articles_collection = new ArticlesCollection($link);

$articles = $articles_collection->get_all();

$articles = array_reverse($articles, true);

$count = count($articles);

DBClient::close($link);

include("views/articles.php");