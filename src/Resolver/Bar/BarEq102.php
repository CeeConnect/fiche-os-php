<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEq102
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['classeEquipement', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['classeEquipement']) {
            case Value::CLASSE_ENERGIE_A2:
                return 190 * $data['nombreEquipements'];
            case Value::CLASSE_ENERGIE_A3:
                return 350 * $data['nombreEquipements'];
            default:
                return null;
        }
    }
}
