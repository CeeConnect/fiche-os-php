<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarSe104
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
                return 9800 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 8000 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 5300 * $data['nombreLogements'];
            default:
                return null;
        }
    }
}
