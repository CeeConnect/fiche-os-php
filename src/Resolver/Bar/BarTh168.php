<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh168
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'usageChauffageEquipement', 'surfaceCapteursSolaires'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return $data['usageChauffageEquipement'] ? 14300 * $data['surfaceCapteursSolaires'] : 7100 * $data['surfaceCapteursSolaires'];
            case Value::ZONE_CLIMATIQUE_H2:
                return $data['usageChauffageEquipement'] ? 12800 * $data['surfaceCapteursSolaires'] : 8200 * $data['surfaceCapteursSolaires'];
            case Value::ZONE_CLIMATIQUE_H3:
                return $data['usageChauffageEquipement'] ? 11000 * $data['surfaceCapteursSolaires'] : 10400 * $data['surfaceCapteursSolaires'];
            default:
                return null;
        }
    }
}
