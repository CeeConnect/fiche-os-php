<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh165
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['puissanceEquipement', 'chaleurNetteUtileEquipement'];
    }

    public static function get(array $data): ?float
    {
        if ($data['puissanceEquipement'] <= 500) {
            return $data['chaleurNetteUtileEquipement'] * 4.8;
        } else if ($data['puissanceEquipement'] > 500) {
            return $data['chaleurNetteUtileEquipement'] * 3.4;
        } else {
            return null;
        }
    }
}
