<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEq103
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['typeEquipement', 'classeEquipement', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeEquipement']) {
            case Value::BAR_EQ_103_REFRIGERATEUR:
                switch ($data['zoneClimatique']) {
                    case Value::CLASSE_ENERGIE_A2:
                        return 440 * $data['nombreEquipements'];
                    case Value::CLASSE_ENERGIE_A3:
                        return 1000 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            case Value::BAR_EQ_103_CONGELATEUR:
                switch ($data['zoneClimatique']) {
                    case Value::CLASSE_ENERGIE_A2:
                        return 490 * $data['nombreEquipements'];
                    case Value::CLASSE_ENERGIE_A3:
                        return 1100 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
