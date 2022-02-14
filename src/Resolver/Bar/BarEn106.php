<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn106
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['ageBatiment', 'typeBatiment', 'surfaceIsolant'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                return $data['ageBatiment'] < 2 ? 210 * $data['surfaceIsolant'] : 320 * $data['surfaceIsolant'];
            case Value::TYPE_BATIMENT_IMMEUBLE:
                return $data['ageBatiment'] < 2 ? 250 * $data['surfaceIsolant'] : 380 * $data['surfaceIsolant'];
            default:
                return null;
        }
    }
}
