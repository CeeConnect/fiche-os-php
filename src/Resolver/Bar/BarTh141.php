<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh141
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['typeBatiment', 'puissanceFrigorifiqueEquipement', 'classeEquipement'];
    }

    public static function get(array $data): ?float
    {
        switch ($data['typeBatiment']) {
            case Value::TYPE_BATIMENT_MAISON:
                if ($data['puissanceFrigorifiqueEquipement'] === 2.05 || $data['puissanceFrigorifiqueEquipement'] === 7000) {
                    switch ($data['classeEquipement']) {
                        case Value::CLASSE_ENERGIE_A:
                            return 2300;
                        case Value::CLASSE_ENERGIE_A1:
                            return 4100;
                        case Value::CLASSE_ENERGIE_A2:
                            return 5700;
                        case Value::CLASSE_ENERGIE_A2:
                            return 10600;
                        default:
                            return null;
                    }
                } else if ($data['puissanceFrigorifiqueEquipement'] === 2.64 || $data['puissanceFrigorifiqueEquipement'] === 9000) {
                    switch ($data['classeEquipement']) {
                        case Value::CLASSE_ENERGIE_A:
                            return 2600;
                        case Value::CLASSE_ENERGIE_A1:
                            return 4800;
                        case Value::CLASSE_ENERGIE_A2:
                            return 6600;
                        case Value::CLASSE_ENERGIE_A2:
                            return 12200;
                        default:
                            return null;
                    }
                } else {
                    return null;
                }
            case Value::TYPE_BATIMENT_APPARTEMENT:
                if ($data['puissanceFrigorifiqueEquipement'] === 2.05 || $data['puissanceFrigorifiqueEquipement'] === 7000) {
                    switch ($data['classeEquipement']) {
                        case Value::CLASSE_ENERGIE_A:
                            return 1300;
                        case Value::CLASSE_ENERGIE_A1:
                            return 2500;
                        case Value::CLASSE_ENERGIE_A2:
                            return 3400;
                        case Value::CLASSE_ENERGIE_A2:
                            return 6300;
                        default:
                            return null;
                    }
                } else if ($data['puissanceFrigorifiqueEquipement'] === 2.64 || $data['puissanceFrigorifiqueEquipement'] === 9000) {
                    switch ($data['classeEquipement']) {
                        case Value::CLASSE_ENERGIE_A:
                            return 1600;
                        case Value::CLASSE_ENERGIE_A1:
                            return 2900;
                        case Value::CLASSE_ENERGIE_A2:
                            return 4000;
                        case Value::CLASSE_ENERGIE_A2:
                            return 7400;
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
