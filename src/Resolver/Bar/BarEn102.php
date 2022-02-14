<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn102
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['dateEngagement', 'zoneClimatique', 'surfaceIsolant', 'energieChauffage'];
    }

    public static function get(array $data): ?float
    {
        if ($data['dateEngagement'] < new \DateTime('2022-05-01')) {
            switch ($data['zoneClimatique']) {
                case Value::ZONE_CLIMATIQUE_H1:
                    switch ($data['energieChauffage']) {
                        case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                            return 2400 * $data['surfaceIsolant'];
                        case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                            return 3800 * $data['surfaceIsolant'];
                    }
                case Value::ZONE_CLIMATIQUE_H2:
                    switch ($data['energieChauffage']) {
                        case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                            return 2000 * $data['surfaceIsolant'];
                        case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                            return 3100 * $data['surfaceIsolant'];
                    }
                case Value::ZONE_CLIMATIQUE_H3:
                    switch ($data['energieChauffage']) {
                        case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                            return 1300 * $data['surfaceIsolant'];
                        case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                            return 2100 * $data['surfaceIsolant'];
                    }
                default:
                    return null;
            }
        }
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 1600 * $data['surfaceIsolant'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 1300 * $data['surfaceIsolant'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 880 * $data['surfaceIsolant'];
            default:
                return null;
        }
    }
}
