<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh107Se
{
    use ResolverTrait;

    public static function map(): array
    {
        return [
            'zoneClimatique',
            'dureeContrat',
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
                    ? 47500 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data)
                    : 50100 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data);
            case Value::ZONE_CLIMATIQUE_H2:
                return $data['puissanceEquipement'] <= 400
                    ? 40900 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data)
                    : 43200 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data);
            case Value::ZONE_CLIMATIQUE_H3:
                return $data['puissanceEquipement'] <= 400
                    ? 30500 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data)
                    : 32100 * $data['nombreLogements'] * self::getCoefficient($data) * self::getFacteur($data);
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

    private static function getFacteur(array $data): ?float
    {
        if ($data['dureeContrat'] === 1) {
            return 1.01;
        } else if ($data['dureeContrat'] === 2) {
            return 1.02;
        } else if ($data['dureeContrat'] === 3) {
            return 1.05;
        } else if ($data['dureeContrat'] === 4) {
            return 1.06;
        } else if ($data['dureeContrat'] === 5) {
            return 1.08;
        } else if ($data['dureeContrat'] === 6) {
            return 1.11;
        } else if ($data['dureeContrat'] === 7) {
            return 1.12;
        } else if ($data['dureeContrat'] === 8) {
            return 1.15;
        } else if ($data['dureeContrat'] === 9) {
            return 1.17;
        } else if ($data['dureeContrat'] === 10) {
            return 1.19;
        } else {
            return null;
        }
    }
}
