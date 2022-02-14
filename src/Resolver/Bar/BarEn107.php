<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEn107
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['ageBatiment', 'typeBatiment', 'resistanceIsolant', 'surfaceIsolant'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                if ($data['ageBatiment'] < 2) {
                    if ($data['resistanceIsolant'] >= 0.5 && $data['resistanceIsolant'] < 1.2) {
                        return 130 * $data['surfaceIsolant'];
                    }
                    if ($data['resistanceIsolant'] >= 1.2) {
                        return 150 * $data['surfaceIsolant'];
                    }
                } else {
                    if ($data['resistanceIsolant'] >= 0.5 && $data['resistanceIsolant'] < 1.2) {
                        return 200 * $data['surfaceIsolant'];
                    }
                    if ($data['resistanceIsolant'] >= 1.2) {
                        return 240 * $data['surfaceIsolant'];
                    }
                }
            case Value::TYPE_BATIMENT_IMMEUBLE:
                if ($data['ageBatiment'] < 2) {
                    if ($data['resistanceIsolant'] >= 0.5 && $data['resistanceIsolant'] < 1.2) {
                        return 160 * $data['surfaceIsolant'];
                    }
                    if ($data['resistanceIsolant'] >= 1.2) {
                        return 180 * $data['surfaceIsolant'];
                    }
                } else {
                    if ($data['resistanceIsolant'] >= 0.5 && $data['resistanceIsolant'] < 1.2) {
                        return 240 * $data['surfaceIsolant'];
                    }
                    if ($data['resistanceIsolant'] >= 1.2) {
                        return 280 * $data['surfaceIsolant'];
                    }
                }
            default:
                return null;
        }
    }
}
