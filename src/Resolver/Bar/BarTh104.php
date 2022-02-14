<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh104
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'etasEquipement', 'surfaceChauffee'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                if ($data['etasEquipement'] >= 102 && $data['etasEquipement'] < 110) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 52700 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 43100 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 28700 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 110 && $data['etasEquipement'] < 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 66400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 54400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 36200  * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 79900 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 65400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 43600 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                if ($data['etasEquipement'] >= 102 && $data['etasEquipement'] < 110) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 24500 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 20100 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 13400 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 110 && $data['etasEquipement'] < 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 32200 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 26400 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 17600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 39700 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 32500 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 21700 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                }
            default:
                return null;
        }
    }
}
