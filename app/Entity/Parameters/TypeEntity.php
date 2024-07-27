<?php

namespace App\Entity\Parameters;

class TypeEntity
{
    public const TYPE_WITHOUT_IMAGES = 1;

    public const TYPE_WITH_IMAGES = 2;

    public static function getAllTypes(): array
    {
        return [
            self::TYPE_WITHOUT_IMAGES,
            self::TYPE_WITH_IMAGES,
        ];
    }
}
