<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh116
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'typeChauffage', 'surfaceChauffee'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 300 * $data['surfaceChauffee'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 250 * $data['surfaceChauffee'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 160 * $data['surfaceChauffee'];
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 210 * $data['surfaceChauffee'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 280  * $data['surfaceChauffee'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 170 * $data['surfaceChauffee'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 230  * $data['surfaceChauffee'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 110 * $data['surfaceChauffee'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 150  * $data['surfaceChauffee'];
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
