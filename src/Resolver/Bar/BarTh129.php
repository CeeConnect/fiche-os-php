<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh129
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'copEquipement', 'surfaceChauffee'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                if ($data['copEquipement'] >= 3.9 && $data['copEquipement'] < 4.3) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 77900 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 63700 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 42500 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['copEquipement'] >= 4.3) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 80200 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 65600 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 43700 * Common::facteurCorrectifMaison($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else {
                    return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                if ($data['copEquipement'] >= 3.9) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 21300 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 17400 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 11600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else {
                    return null;
                }
            default:
                return null;
        }
    }
}
