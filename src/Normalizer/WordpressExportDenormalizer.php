<?php

namespace RickWest\ExportToMarkdown\Normalizer;


use RickWest\ExportToMarkdown\Model\Item;
use RickWest\ExportToMarkdown\Model\WordpressExport;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


class WordpressExportDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{

    private $denormalizer;

    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }


    public function supportsDenormalization($object, $type, $format = null)
    {
        return $type === WordpressExport::class;
    }

    public function denormalize($object, $class, $format = null, array $context = [])
    {
        $export = new WordpressExport();

        foreach($object['channel']['item'] as $input) {
            /** @var Item $item */
            $item = $this->denormalizer->denormalize($input, Item::class, $format, $context);
            $export->addItem($item);
        }

        return $export;
    }
}