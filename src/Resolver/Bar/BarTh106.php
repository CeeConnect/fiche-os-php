<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh106
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'surfaceHabitable', 'nombreLogements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 46900 * Common::facteurCorrectifMaison($data['surfaceHabitable'], true);
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 39600 * Common::facteurCorrectifMaison($data['surfaceHabitable'], true);
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 28500 * Common::facteurCorrectifMaison($data['surfaceHabitable'], true);
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 24800 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 21200 * $data['nombreLogements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 15800 * $data['nombreLogements'];
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
