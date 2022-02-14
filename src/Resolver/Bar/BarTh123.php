<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh123
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'nombreLogements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 12400 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 10100 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 6700 * $data['nombreLogements'];
            default:
                return null;
        }
    }
}
