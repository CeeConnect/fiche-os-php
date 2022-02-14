<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh112
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
                return 38200;
            case Value::ZONE_CLIMATIQUE_H2:
                return 31300;
            case Value::ZONE_CLIMATIQUE_H3:
                return 20900;
            default:
                return null;
        }
    }
}
