<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn101
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['dateEngagement', 'zoneClimatique', 'surfaceIsolant'];
    }

    public static function get(array $data): ?float
    {
        if ($data['dateEngagement'] < new \DateTime('2022-05-01')) {
            switch ($data['zoneClimatique']) {
                case Value::ZONE_CLIMATIQUE_H1:
                    return 1700 * $data['surfaceIsolant'];
                case Value::ZONE_CLIMATIQUE_H2:
                    return 1400 * $data['surfaceIsolant'];
                case Value::ZONE_CLIMATIQUE_H3:
                    return 900 * $data['surfaceIsolant'];
                default:
                    return null;
            }
        }
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                return 1700 * $data['surfaceIsolant'];
            case Value::ZONE_CLIMATIQUE_H2:
                return 1400 * $data['surfaceIsolant'];
            case Value::ZONE_CLIMATIQUE_H3:
                return 920 * $data['surfaceIsolant'];
            default:
                return null;
        }
    }
}
