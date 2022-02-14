<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarSe105
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'dureeGarantie', 'nombreLogements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['zoneClimatique']) {
            case Value::ZONE_CLIMATIQUE_H1:
                if ($data['dureeGarantie'] === 2) {
                    return 2400 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 3) {
                    return 3500 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 4) {
                    return 4600 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 5) {
                    return 5600 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 6) {
                    return 6600 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 7) {
                    return 7600 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 8) {
                    return 8500 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 9) {
                    return 9400 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] >= 10) {
                    return 10200 * $data['nombreLogements'];
                } else {
                    return null;
                }
            case Value::ZONE_CLIMATIQUE_H2:
                if ($data['dureeGarantie'] === 2) {
                    return 2000 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 3) {
                    return 2900 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 4) {
                    return 3800 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 5) {
                    return 4700 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 6) {
                    return 5500 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 7) {
                    return 6300 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 8) {
                    return 7100 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 9) {
                    return 7800 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] >= 10) {
                    return 8500 * $data['nombreLogements'];
                } else {
                    return null;
                }
            case Value::ZONE_CLIMATIQUE_H3:
                if ($data['dureeGarantie'] === 2) {
                    return 1500 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 3) {
                    return 2200 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 4) {
                    return 2800 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 5) {
                    return 3400 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 6) {
                    return 4100 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 7) {
                    return 4700 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 8) {
                    return 5200 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] === 9) {
                    return 5800 * $data['nombreLogements'];
                } else if ($data['dureeGarantie'] >= 10) {
                    return 6300 * $data['nombreLogements'];
                } else {
                    return null;
                }
            default:
                return null;
        }
    }
}
