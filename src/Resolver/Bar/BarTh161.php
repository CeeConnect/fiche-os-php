<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh161
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['diametreCanalisation', 'typePointSingulier', 'zoneClimatique', 'temperatureFluide', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typePointSingulier']) {
            case Value::BAR_TH_161_TYPE_ECHANGEUR:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                            return 77200 * $data['nombreEquipements'];
                        } else if ($data['temperatureFluide'] > 120) {
                            return 88000 * $data['nombreEquipements'];
                        } else {
                            return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                            return 73500  * $data['nombreEquipements'];
                        } else if ($data['temperatureFluide'] > 120) {
                            return 83900 * $data['nombreEquipements'];
                        } else {
                            return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                            return 66900 * $data['nombreEquipements'];
                        } else if ($data['temperatureFluide'] > 120) {
                            return 76300 * $data['nombreEquipements'];
                        } else {
                            return null;
                        }
                    default:
                        return null;
                }
            case Value::BAR_TH_161_TYPE_AUTRES:
                if ($data['diametreCanalisation'] >= 20 && $data['diametreCanalisation'] <= 65) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 11700 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 12900 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H2:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 10500 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 11600 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H3:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 8800 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 9700 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        default:
                            return null;
                    }
                } else if ($data['diametreCanalisation'] < 65 && $data['diametreCanalisation'] <= 100) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 25100 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 27800 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H2:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 22700 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 25100 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H3:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 18900 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 20900 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        default:
                            return null;
                    }
                } else if ($data['diametreCanalisation'] > 100) {
                    switch ($data['zoneClimatique']) {
                        case Value::ZONE_CLIMATIQUE_H1:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 40900 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 45400 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H2:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 37000 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 41000 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        case Value::ZONE_CLIMATIQUE_H3:
                            if ($data['temperatureFluide'] >= 50 && $data['temperatureFluide'] < 120) {
                                return 30800 * $data['nombreEquipements'];
                            } else if ($data['temperatureFluide'] > 120) {
                                return 34100 * $data['nombreEquipements'];
                            } else {
                                return null;
                            }
                        default:
                            return null;
                    }
                } else {
                    return null;
                }
            default:
                return null;
        }
    }
}
