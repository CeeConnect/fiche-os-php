<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarSe107
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
                return 13000 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 10900 * $data['nombreLogements'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 8500 * $data['nombreLogements'];
            default:
                return null;
        }
    }
}
