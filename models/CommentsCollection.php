<?php
/**
 * Created by PhpStorm.
 * User: Даниил
 * Date: 11.10.2015
 * Time: 19:00
 */


/**
 * Работа с комментариями
 */
class CommentsCollection
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

        //коллекция комментариев
        CommentsCollection::$collection = $link->blog->comments;
    }

    /**
     * @param $from
     * @param $title
     * @param $message
     * @param $article_id
     */
    public function add($from, $title, $message, $article_id)
    {
        $document = [
            "from" => $from,
            "title" => $title,
            "message" => $message,
            "article_id" => $article_id,
            "saved_at" => new MongoDate()
        ];

        CommentsCollection::$collection->insert($document);
    }

    public function delete($id)
    {
        return CommentsCollection::$collection->remove(["_id" => new MongoId($id)]);
    }

    public function get_all_for_article($article_id)
    {
        $coursor = CommentsCollection::$collection->find(["article_id" => $article_id]);

        if ($coursor->count() == 0) return null;

        foreach ($coursor as $document) {
            $document["saved_at"] = date('Y-m-d H:i', $document["saved_at"]->sec);
            $comments[] = $document;
        }

        return $comments;
    }
}