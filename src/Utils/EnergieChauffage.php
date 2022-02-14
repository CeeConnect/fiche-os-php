<?php

namespace CeeConnect\FicheOS\Utils;

use CeeConnect\FicheOS\Value\EnergieChauffage as Value;

class EnergieChauffage
{
    public static function toEnergieChauffage(?string $energieChauffage): ?string
    {
        if (!\in_array($energieChauffage, Value::get())) {
            return null;
        }
        return $energieChauffage === Value::ENERGIE_CHAUFFAGE_ELECTRICITE
            ? Value::ENERGIE_CHAUFFAGE_ELECTRICITE
            : Value::ENERGIE_CHAUFFAGE_COMBUSTIBLE;
    }
}
