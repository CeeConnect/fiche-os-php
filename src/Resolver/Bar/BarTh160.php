<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh160
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['dateEngagement', 'zoneClimatique', 'longueurReseau'];
    }

    public static function get(array $data): ?float
    {
        if ($data['dateEngagement'] < new \DateTime('2022-05-01')) {
            switch ($data['zoneClimatique']) {
                case Value::ZONE_CLIMATIQUE_H1:
                    return 6700 * $data['longueurReseau'];
                case Value::ZONE_CLIMATIQUE_H2:
                    return 5600 * $data['longueurReseau'];
                case Value::ZONE_CLIMATIQUE_H3:
                    return 4900 * $data['longueurReseau'];
                default:
                    return null;
            }
        }
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 5100 * $data['longueurReseau'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 4600 * $data['longueurReseau'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 3800 * $data['longueurReseau'];
            default:
                return null;
        }
    }
}
