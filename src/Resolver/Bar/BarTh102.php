<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh102
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['besoinECS', 'productionSolaireUtile'];
    }

    public static function get(array $data): ?float
    {
        return $data['besoinECS'] * ($data['productionSolaireUtile'] / $data['besoinECS'] * 100) * 0.196;
    }
}
