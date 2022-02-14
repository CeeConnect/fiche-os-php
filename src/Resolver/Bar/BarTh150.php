<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh150
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'puissanceEquipement',
            'puissanceEquipementsEligibles',
            'puissanceFinaleChaufferie',
            'puissanceChaudieresEligibles',
            'etasEquipement',
            'copEquipement',
            'usageEcsEquipement',
            'nombreLogements'
        ];
    }

    public static function get(array $data): ?float
    {
        if ($data['puissanceEquipement'] <= 400) {
            if ($data['etasEquipement'] >= 111 && $data['etasEquipement'] < 120) {
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return $data['usageEcsEquipement']
                            ? 83200 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 56400 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return $data['usageEcsEquipement']
                            ? 72000 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 46200 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return $data['usageEcsEquipement']
                            ? 30600 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 54000 * $data['nombreLogements'] * self::getCoefficient($data);
                    default:
                        return null;
                }
            } else if ($data['etasEquipement'] >= 120) {
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return $data['usageEcsEquipement']
                            ? 62900 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 65800 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return $data['usageEcsEquipement']
                            ? 83900 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 53900 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return $data['usageEcsEquipement']
                            ? 96900 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 35700 * $data['nombreLogements'] * self::getCoefficient($data);
                    default:
                        return null;
                }
            }
        } else if ($data['puissanceEquipement'] > 400) {
            if ($data['copEquipement'] >= 1.3 && $data['copEquipement'] < 1.6) {
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return $data['usageEcsEquipement']
                            ? 106000 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 71900  * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return $data['usageEcsEquipement']
                            ? 91700 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 58900 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return $data['usageEcsEquipement']
                            ? 68800 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 39000 * $data['nombreLogements'] * self::getCoefficient($data);
                    default:
                        return null;
                }
            } else if ($data['copEquipement'] >= 1.6) {
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return $data['usageEcsEquipement']
                            ? 134300 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 91100 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return $data['usageEcsEquipement']
                            ? 116200 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 74600 * $data['nombreLogements'] * self::getCoefficient($data);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return $data['usageEcsEquipement']
                            ? 87200 * $data['nombreLogements'] * self::getCoefficient($data)
                            : 49500 * $data['nombreLogements'] * self::getCoefficient($data);
                    default:
                        return null;
                }
            }
        }
        return null;
    }

    private static function getCoefficient(array $data): ?float
    {
        if ($data['puissanceChaudieresEligibles']) {
            return $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
                ? $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie']
                : 1;
        }
        return $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie'] < 0.4
            ? $data['puissanceEquipementsEligibles'] / $data['puissanceFinaleChaufferie']
            : 1;
    }
}
