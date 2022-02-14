<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarSe106
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'usage'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 400;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 620;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 90;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 340;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 510;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 90;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 250;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 380;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 90;
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 160;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 340;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 60;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 140;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 290;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 60;
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['usage']) {
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_ELECTRIQUE:
                                return 110;
                            case Value::BAR_SE_106_USAGE_CHAUFFAGE_GAZ:
                                return 220;
                            case Value::BAR_SE_106_USAGE_ELECTRICITE:
                                return 60;
                            default:
                                return null;
                        }
                    default:
                        return null;
                }
            default:
                return null;
        }
    }
}
