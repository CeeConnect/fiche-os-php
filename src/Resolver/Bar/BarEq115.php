<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEq115
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['typeBatiment', 'zoneClimatique', 'suiviConfort', 'surfaceHabitable'];
    }

    public static function get(array $data): ?float
    {
        $coefficient = $data['suiviConfort'] === true ? 1 : 0.8;
        $partFixe = 0;

        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                $partFixe = 650;

                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 4400 * $coefficient * Common::facteurCorrectifMaison($data['surfaceHabitable']) + $partFixe;
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 3700 * $coefficient * Common::facteurCorrectifMaison($data['surfaceHabitable']) + $partFixe;
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 2700 * $coefficient * Common::facteurCorrectifMaison($data['surfaceHabitable']) + $partFixe;
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                $partFixe = 410;

                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 2600 * $coefficient * Common::facteurCorrectifAppartement($data['surfaceHabitable']) + $partFixe;
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 2200 * $coefficient * Common::facteurCorrectifAppartement($data['surfaceHabitable']) + $partFixe;
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 1700 * $coefficient * Common::facteurCorrectifAppartement($data['surfaceHabitable']) + $partFixe;
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
