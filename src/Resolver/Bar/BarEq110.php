<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarEq110
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['ikEquipement', 'typeDetectionEquipement', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        if ($data['ikEquipement'] < 10) {
            switch ($data['typeDetectionEquipement']) {
                case Value::BAR_EQ_110_TYPE_DETECTION_SIMPLE:
                    return 1500 * $data['nombreEquipements'];
                case Value::BAR_EQ_110_TYPE_DETECTION_MULTIPLE:
                    return 1900 * $data['nombreEquipements'];
                default:
                    return null;
            }
        }
        if ($data['ikEquipement'] === 10) {
            switch ($data['typeDetectionEquipement']) {
                case Value::BAR_EQ_110_TYPE_DETECTION_SIMPLE:
                    return 1200 * $data['nombreEquipements'];
                case Value::BAR_EQ_110_TYPE_DETECTION_MULTIPLE:
                    return 1600 * $data['nombreEquipements'];
                default:
                    return null;
            }
        }
        return null;
    }
}
