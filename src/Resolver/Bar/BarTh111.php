<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh111
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'energieChauffage', 'surfaceHabitable'];
    }

    public static function get(array $data): ?float
    {
        $coefficient = Common::facteurCorrectifMaison($data['surfaceHabitable']);

        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 2200 * $coefficient;
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 3300 * $coefficient;
                    default:
                        return null;
                }
            case Value::ZONE_CLIMATIQUE_H2:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 1800  * $coefficient;
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 2700 * $coefficient;
                    default:
                        return null;
                }
            case Value::ZONE_CLIMATIQUE_H3:
                switch ($data['energieChauffage']) {
                    case Value::ENERGIE_CHAUFFAGE_ELECTRICITE:
                        return 1200 * $coefficient;
                    case Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE:
                        return 1800 * $coefficient;
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
