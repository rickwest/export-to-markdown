<?php

namespace RickWest\ExportToMarkdown\Model;


class WordpressExport
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


    public function addItem(Item $item): WordpressExport
    {
        $this->items[] = $item;
        return $this;
    }
}