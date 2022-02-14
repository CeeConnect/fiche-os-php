<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh139
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['puissanceEquipement'];
    }

    public static function get(array $data): ?float
    {
        return 14600 * $data['puissanceEquipement'];
    }
}
