<?php

namespace RickWest\ExportToMarkdown;


use League\HTMLToMarkdown\HtmlConverter;
use RickWest\ExportToMarkdown\Model\Item;
use RickWest\ExportToMarkdown\Model\WordpressExport;
use RickWest\ExportToMarkdown\NameConverter\EncodedSuffixNameConverter;
use RickWest\ExportToMarkdown\Normalizer\WordpressExportDenormalizer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class ExportToMarkdown
{
    public function handle($input)
    {
        $nameConverter = new EncodedSuffixNameConverter();

        $normalizers = [
            new WordpressExportDenormalizer(),
            new ObjectNormalizer(null, $nameConverter),
        ];

        $serializer = new Serializer($normalizers, [ new XmlEncoder() ]);

        $export = $serializer->deserialize($input, WordpressExport::class, 'xml');

        $items = $export->getItems();

        $count = 0;
        foreach($items as $item) {

            /** @var Item $item */
            if (! $item->getContent()) {
                continue;
            }

            $converter = new HtmlConverter();

            $content = $converter->convert($item->getContent());
            // need to catch exception and continue;

            $data = <<<EOT
---
title: {$item->getTitle()}
data: {$item->getPubDate()}
description: {$item->getDescription()}
---

$content

EOT;

            // file names could be the dates as jigsaw will automatically sort by date
            // but personally I'm not keen so will parse link and generate filename;
            $url = parse_url($item->getLink());

            $name = preg_replace('/[^a-zA-Z-]/', '', $url['path']);

            // returns number of bytes of false on failure;
            $success = file_put_contents($name . '.md', $data);

            if ($success === false) {
                // Show error or a useful message??
            } else {
                $count++;
            };
        }

        return $count;
    }
}