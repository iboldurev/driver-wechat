<?php

namespace BotMan\Drivers\WeChat\Extensions;

use JsonSerializable;

class ElementArticle implements JsonSerializable
{
    /** @var string */
    protected $title;

    /** @var string */
    protected $description;

    /** @var string */
    protected $picUrl;

    /** @var string */
    protected $url;

    public static function create($title)
    {
        return new static($title);
    }

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function description(string $description)
    {
        $this->description = $description;

        return $this;
    }

    public function picUrl(string $picUrl)
    {
        $this->picUrl = $picUrl;

        return $this;
    }

    public function url(string $url)
    {
        $this->url = $url;

        return $this;
    }

    public function toArray()
    {
        return [
            'title' => $this->title,
            'description' => $this->description,
            'picurl' => $this->picUrl,
            'url' => $this->url,
        ];
    }

    public function jsonSerialize()
    {
        return $this->toArray();
    }
}