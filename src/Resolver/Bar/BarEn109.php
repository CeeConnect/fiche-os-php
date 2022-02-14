<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn109
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['typeBatiment', 'surfaceProtegee'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                return 400 * $data['surfaceProtegee'];
            case Value::TYPE_BATIMENT_IMMEUBLE:
                return 520 * $data['surfaceProtegee'];
            default:
                return null;
        }
    }
}
