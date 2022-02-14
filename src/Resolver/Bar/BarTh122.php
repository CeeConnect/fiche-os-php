<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh122
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'puissanceEquipementsEligibles',
            'puissancePacEligibles',
            'puissanceFinaleChaufferie',
            'nombreLogements'
        ];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 16300 * $data['nombreLogements'] * self::getCoefficient($data);
            case Value::ZONE_CLIMATIQUE_H2:
                return 14000 * $data['nombreLogements'] * self::getCoefficient($data);
            case Value::ZONE_CLIMATIQUE_H3:
                return 10200 * $data['nombreLogements'] * self::getCoefficient($data);
            default:
                return null;
        }
    }

    private static function getCoefficient(array $data): ?float
    {
        if ($data['puissancePacEligibles']) {
            return $data['puissancePacEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
                ? $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie']
                : 0;
        }
        if ($data['puissanceEquipementsEligibles'] < $data['puissanceFinaleChaufferie'] / 3) {
            return $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie'];
        }
        return 1;
    }
}
