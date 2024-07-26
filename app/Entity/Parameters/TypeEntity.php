<?php

namespace App\Entity\Parameters;

class TypeEntity
{
    public const TYPE_WITH_IMAGES = 2;

    public const TYPE_WITHOUT_IMAGES = 1;

    public static function getAllTypes(): array
    {
        return [
            self::TYPE_WITH_IMAGES,
            self::TYPE_WITHOUT_IMAGES,
        ];
    }
}
