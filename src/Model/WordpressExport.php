<?php

namespace RickWest\ExportToMarkdown\Model;


/**
 * Class WordpressExport
 * @package RickWest\ExportToMarkdown
 */
class WordpressExport implements ItemsInterface
{
    /** @var Item[] */
    private $items;

    /**
     * @return Item[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param Item[] $items
     * @return WordpressExport
     */
    public function setItems(array $items): WordpressExport
    {
        $this->items = $items;
        return $this;
    }

    /**
     * @param Item $item
     * @return WordpressExport
     */
    public function addItem(Item $item): WordpressExport
    {
        $this->items[] = $item;
        return $this;
    }
}