<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh118
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'energieChauffage', 'typeChauffage', 'nombreLogements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeChauffage']) {
            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['energieChauffage']) {
                            case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                                return 4300;
                            case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                                return 6600;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['energieChauffage']) {
                            case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                                return 3500;
                            case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                                return 5400;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['energieChauffage']) {
                            case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                                return 2300;
                            case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                                return 3600;
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            case Value::TYPE_INSTALLATION_COLLECTIF:
                if ($data['energieChauffage'] === Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            return 9100 * $data['nombreLogements'];
                        case Value::ZONE_CLIMATIQUE_H2:
                            return 7400 * $data['nombreLogements'];
                        case Value::ZONE_CLIMATIQUE_H3:
                            return 4900 * $data['nombreLogements'];
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
