<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh159
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
                if ($data['etasEquipement'] >= 111 && $data['etasEquipement'] < 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 74100 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 62800 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 45600 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 120 && $data['etasEquipement'] < 130) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 90300 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 76500 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 55400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 130 && $data['etasEquipement'] < 140) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 104800 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 88800 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 64400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 140 && $data['etasEquipement'] < 150) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 117200 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 99400 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 72000 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 150 && $data['etasEquipement'] < 160) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 128000 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 108500 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 78700 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 160) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 137500 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 116600 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 84500 * Common::facteurCorrectifMaison($data['surfaceChauffee'], true);
                        default:
                            return null;
                    }
                } else {
                    return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                if ($data['etasEquipement'] >= 111 && $data['etasEquipement'] < 120) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 39600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 33900 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 25600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 120 && $data['etasEquipement'] < 130) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 48200 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 41300 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 31200 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 130 && $data['etasEquipement'] < 140) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 55900 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 47900 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 36200 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 140 && $data['etasEquipement'] < 150) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 62600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 53600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 40500 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 150 && $data['etasEquipement'] < 160) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 68400 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 58600 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 44200 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        default:
                            return null;
                    }
                } else if ($data['etasEquipement'] >= 160) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 73400 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 62900 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 47500 * Common::facteurCorrectifAppartement($data['surfaceChauffee']);
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
