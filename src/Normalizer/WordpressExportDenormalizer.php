<?php

namespace RickWest\ExportToMarkdown\Normalizer;


use RickWest\ExportToMarkdown\Model\Item;
use RickWest\ExportToMarkdown\Model\WordpressExport;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;


/**
 * Class WordpressExportDenormalizer
 * @package RickWest\ExportToMarkdown
 */
class WordpressExportDenormalizer implements DenormalizerInterface, DenormalizerAwareInterface
{
    /**
     * @var DenormalizerInterface $denormalizer
     */
    private $denormalizer;

    /**
     * @param DenormalizerInterface $denormalizer
     */
    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
        $this->denormalizer = $denormalizer;
    }


    /**
     * @param mixed $object
     * @param string $type
     * @param null $format
     * @return bool
     */
    public function supportsDenormalization($object, $type, $format = null)
    {
        return $type === WordpressExport::class;
    }

    /**
     * @param mixed $object
     * @param string $class
     * @param null $format
     * @param array $context
     * @return object|WordpressExport
     */
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