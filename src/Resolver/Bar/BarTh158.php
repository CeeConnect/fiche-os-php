<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh158
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 2100 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 1700 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 1100 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 1100 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 900 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 600 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
