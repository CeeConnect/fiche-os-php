<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh101
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
                return 21500;
            case Value::ZONE_CLIMATIQUE_H2:
                return 24100;
            case Value::ZONE_CLIMATIQUE_H3:
                return 27600;
            default:
                return null;
        }
    }
}
