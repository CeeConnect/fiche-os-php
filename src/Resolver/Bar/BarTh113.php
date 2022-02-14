<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh113
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 41300;
            case Value::ZONE_CLIMATIQUE_H2:
                return 33800;
            case Value::ZONE_CLIMATIQUE_H3:
                return 26300;
            default:
                return null;
        }
    }
}
