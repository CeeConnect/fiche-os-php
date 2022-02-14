<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEq111
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['lumensEquipement', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        if ($data['lumensEquipement'] >= 250 && $data['lumensEquipement'] < 800) {
            return 20 * $data['nombreEquipements'];
        }
        if ($data['lumensEquipement'] >= 800 && $data['lumensEquipement'] < 1000) {
            return 40 * $data['nombreEquipements'];
        }
        if ($data['lumensEquipement'] >= 1000) {
            return 50 * $data['nombreEquipements'];
        }
        return null;
    }
}
