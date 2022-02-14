<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn104
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'nombreEquipements', 'energieChauffage'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 5200 * $data['nombreEquipements'];
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 8200 * $data['nombreEquipements'];
                }
            case Value::ZONE_CLIMATIQUE_H2:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 4200 * $data['nombreEquipements'];
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 6700 * $data['nombreEquipements'];
                }
            case Value::ZONE_CLIMATIQUE_H3:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 2800  * $data['nombreEquipements'];
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 4500 * $data['nombreEquipements'];
                }
            default:
                return null;
        }
    }
}
