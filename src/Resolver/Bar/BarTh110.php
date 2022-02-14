<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh110
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['zoneClimatique', 'typeBatiment', 'typeChauffage', 'nombreLogements'];
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
                        return 910 * $data['nombreEquipements'];
                    default:
                        return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                switch ($data['zoneClimatique']) {
                    case Value::ZONE_CLIMATIQUE_H1:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 1100 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 1000  * $data['nombreEquipements'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H2:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 880 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 850  * $data['nombreEquipements'];
                            default:
                                return null;
                        }
                    case Value::ZONE_CLIMATIQUE_H3:
                        switch ($data['typeChauffage']) {
                            case Value::TYPE_INSTALLATION_INDIVIDUEL:
                                return 850 * $data['nombreEquipements'];
                            case Value::TYPE_INSTALLATION_COLLECTIF:
                                return 560  * $data['nombreEquipements'];
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
