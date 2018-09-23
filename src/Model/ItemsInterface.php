<?php

namespace RickWest\ExportToMarkdown\Model;


/**
 * Interface ItemsInterface
 * @package RickWest\ExportToMarkdown
 */
interface ItemsInterface
{
    /**
     * @return Item[]
     */
    public function getItems();

    /**
     * @param array $items
     * @return self
     */
    public function setItems(array $items);

    /**
     * @param Item $item
     * @return self
     */
    public function addItem(Item $item);
}