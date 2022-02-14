<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn110
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
                return 7100 * $data['nombreEquipements'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 6000 * $data['nombreEquipements'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 4200  * $data['nombreEquipements'];
            default:
                return null;
        }
    }
}
