<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh117
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'typeChauffage', 'nombreEquipements'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        return 1700 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H2:
                        return 1400 * $data['nombreEquipements'];
                    case Value::ZONE_CLIMATIQUE_H3:
                        return 930 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 1200 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 1600 * $data['nombreEquipements'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 980 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 1300 * $data['nombreEquipements'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 650 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 890 * $data['nombreEquipements'];
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
