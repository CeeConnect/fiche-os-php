<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn108
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 900 * $data['nombreEquipements'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 730 * $data['nombreEquipements'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 490 * $data['nombreEquipements'];
            default:
                return null;
        }
    }
}
