<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 02.10.2015
 * Time: 16:27
 */

/** Получение всех статей
 * @param $link MongoClient
 * @return array Result or null
 */
function articles_get_all($link) {
    //коллекция "articles"
    $collection = $link->blog->articles;

    $coursor = $collection->find();

    if($coursor->count() == 0) return null;

    foreach($coursor as $document) {
        $articles[] = $document;
    }

    return $articles;

}

/** Добавление статьи в базу
 * @param $link MongoClient
 * @param $article array
 */
function article_add($link, $article) {
    $collection = $link->blog->articles;

    $collection->insert($article);
}

/** Удаляет одну статью из коллекции базы
 * @param $link MongoClient
 * @param $id string ID статьи
 */
function article_delete($link, $id) {
    $collection = $link->blog->articles;

    $collection->remove(["_id" => new MongoId($id)]);
}

/** Ищет статью в базе по её id
 * @param $link MongoClient
 * @param $id string ID статьи
 * @return array Статья в виде ассоциативного массива
 */
function article_get_one($link, $id) {
    $collection = $link->blog->articles;

    $article = $collection->findOne(["_id"=> new MongoId($id)]);

    return $article;
}

/** Редактирует запись в базе
 * @param $link MongoClient
 * @param $id string
 * @param $new_article array
 */
function article_edit($link, $id, $new_article) {
    $collection = $link->blog->articles;

    $collection->update(
        ["_id" => new MongoId($id)],
        ['$set' => [
            "title" => $new_article["title"],
            "date" => $new_article["date"],
            "content" => $new_article["content"]
        ]]);
}

/**
 * @param $s string
 * @param int $len
 * @return string
 */
function get_intro($s, $len = 500) {
    $ending = "";
    if(strlen($s) > $len) $ending = "...";

    return mb_substr($s, 0, $len) . $ending;
}