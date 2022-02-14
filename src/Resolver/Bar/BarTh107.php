<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh107
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'puissanceEquipement',
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
                return $data['puissanceEquipement'] <= 400
                    ? 47500 * $data['nombreLogements'] * self::getCoefficient($data)
                    : 50100 * $data['nombreLogements'] * self::getCoefficient($data);
            case Value::ZONE_CLIMATIQUE_H2:
                return $data['puissanceEquipement'] <= 400
                    ? 40900 * $data['nombreLogements'] * self::getCoefficient($data)
                    : 43200 * $data['nombreLogements'] * self::getCoefficient($data);
            case Value::ZONE_CLIMATIQUE_H3:
                return $data['puissanceEquipement'] <= 400
                    ? 30500 * $data['nombreLogements'] * self::getCoefficient($data)
                    : 32100 * $data['nombreLogements'] * self::getCoefficient($data);
            default:
                return null;
        }
    }

    private static function getCoefficient(array $data): ?float
    {
        if ($data['puissancePacEligibles']) {
            return $data['puissancePacEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
                ? $data['puissanceEquipement'] / $data['puissanceFinaleChaufferie']
                : 0;
        }
        if ($data['puissanceEquipement'] < $data['puissanceFinaleChaufferie'] / 3) {
            return $data['puissanceEquipement'] / $data['puissanceFinaleChaufferie'];
        }
        if ($data['puissanceEquipement'] >= $data['puissanceFinaleChaufferie'] / 3) {
            return $data['puissanceEquipement'] === $data['puissanceEquipementsEligibles']
                ? 1
                : $data['puissanceEquipement'] / $data['puissanceEquipementsEligibles'];
        }
        return 1;
    }
}
