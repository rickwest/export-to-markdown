<?php

namespace RickWest\ExportToMarkdown\NameConverter;

use Symfony\Component\Serializer\NameConverter\NameConverterInterface;

class EncodedSuffixNameConverter implements NameConverterInterface
{
    public function normalize($propertyName)
    {
        return $propertyName;
    }

    public function denormalize($propertyName)
    {
        // remove :encoded suffix
        if (substr($propertyName, -8) === ':encoded') {
            return substr($propertyName, 0, -8);
        }

        return $propertyName;
    }
}