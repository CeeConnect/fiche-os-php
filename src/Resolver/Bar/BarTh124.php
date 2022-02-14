<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh124
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['codeDepartement', 'ageBatiment', 'surfaceCapteursSolaires'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['codeDepartement']) {
            case '971':
                return $data['ageBatiment'] < 2 ? 2600 * $data['surfaceCapteursSolaires'] : 5300 * $data['surfaceCapteursSolaires'];
            case '972':
                return $data['ageBatiment'] < 2 ? 2600 * $data['surfaceCapteursSolaires'] : 5300 * $data['surfaceCapteursSolaires'];
            case '973':
                return $data['ageBatiment'] < 2 ? 3000 * $data['surfaceCapteursSolaires'] : 5400 * $data['surfaceCapteursSolaires'];
            case '974':
                return $data['ageBatiment'] < 2 ? 2100 * $data['surfaceCapteursSolaires'] : 4300 * $data['surfaceCapteursSolaires'];
            case '976':
                return $data['ageBatiment'] < 2 ? 2600 * $data['surfaceCapteursSolaires'] : 5300 * $data['surfaceCapteursSolaires'];
            default:
                return null;
        }
    }
}
