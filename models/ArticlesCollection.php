<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 02.10.2015
 * Time: 16:27
 */

class ArticlesCollection
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

        //коллекция articles
        ArticlesCollection::$collection = $link->blog->articles;
    }

    /** Получение всех статей
     * @return array Result or null
     */
    public function get_all()
    {
        $coursor = ArticlesCollection::$collection->find();

        if ($coursor->count() == 0) return null;

        foreach ($coursor as $document) {
            $articles[] = $document;
        }

        return $articles;

    }

    /** Добавление статьи в базу
     * @param $article array
     */
    public function add($article)
    {
        ArticlesCollection::$collection->insert($article);
    }

    /** Удаляет одну статью из коллекции базы
     * @param $link MongoClient
     * @param $id string ID статьи
     */
    public function delete($id)
    {
        ArticlesCollection::$collection->remove(["_id" => new MongoId($id)]);
    }

    /** Ищет статью в базе по её id
     * @param $id string ID статьи
     * @return array Статья в виде ассоциативного массива
     */
    public function get_one($id)
    {
        $article = ArticlesCollection::$collection->findOne(["_id" => new MongoId($id)]);

        return $article;
    }

    /** Редактирует запись в базе
     * @param $id string
     * @param $new_article array
     */
    public function edit($id, $new_article)
    {
        ArticlesCollection::$collection->update(
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
    public function get_intro($s, $len = 500)
    {
        $ending = "";
        if (strlen($s) > $len) $ending = "...";

        return mb_substr($s, 0, $len) . $ending;
    }
}