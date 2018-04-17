<?php

namespace BotMan\Drivers\WeChat\Extensions;

use JsonSerializable;
use BotMan\BotMan\Interfaces\WebAccess;

class NewsTemplate implements JsonSerializable, WebAccess
{
    /** @var array */
    protected $articles = [];

    public static function create()
    {
        return new static();
    }

    public function addArticle(ElementArticle $article)
    {
        $this->articles[] = $article->toArray();

        return $this;
    }

    public function addArticles(array $articles)
    {
        foreach ($articles as $article) {
            if ($article instanceof ElementArticle) {
                $this->articles[] = $article->toArray();
            }
        }

        return $this;
    }

    public function toArray()
    {
        return [
            'msgtype' => 'news',
            'news' => [
                'articles' => $this->articles
            ],
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }

    public function toWebDriver()
    {
        return [
            'type' => 'news',
            'articles' => $this->articles,
        ];
    }
}