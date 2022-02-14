<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh163
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'nombreChaudieres'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 37600 * $data['nombreChaudieres'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 32300 * $data['nombreChaudieres'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 24600 * $data['nombreChaudieres'];
            default:
                return null;
        }
    }
}
