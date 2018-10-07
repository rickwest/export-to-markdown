<?php

namespace RickWest\ExportToMarkdown\Model;


class Item
{
    /** @var string */
    private $title;

    /** @var string */
    private $link;

    /** @var \DateTime */
    private $pubDate;

    /** @var string */
    private $author;

    /** @var string */
    private $description;

    /** @var string */
    private $content;

    /** @var array */
    private $category;

    /** @var string */
    private $excerpt;

    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return Item
     */
    public function setTitle(string $title): Item
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getLink(): string
    {
        return $this->link;
    }

    /**
     * @param string $link
     * @return Item
     */
    public function setLink(string $link): Item
    {
        $this->link = $link;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getPubDate(): \DateTime
    {
        return $this->pubDate;
    }

    /**
     * @param string $pubDate
     * @return Item
     */
    public function setPubDate(string $pubDate): Item
    {
        $this->pubDate = new \DateTime($pubDate);
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthor(): string
    {
        return $this->author;
    }

    /**
     * @param string $author
     * @return Item
     */
    public function setAuthor(string $author): Item
    {
        $this->author = $author;
        return $this;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return Item
     */
    public function setDescription(string $description): Item
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Item
     */
    public function setContent(string $content): Item
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return array
     */
    public function getCategory(): array
    {
        return $this->category;
    }

    /**
     * @param array $category
     * @return Item
     */
    public function setCategory(array $category): Item
    {
        $this->category = $category;
        return $this;
    }

    /**
     * @return string
     */
    public function getExcerpt(): string
    {
        return $this->excerpt;
    }

    /**
     * @param string $excerpt
     * @return Item
     */
    public function setExcerpt(string $excerpt): Item
    {
        $this->excerpt = $excerpt;
        return $this;
    }
}