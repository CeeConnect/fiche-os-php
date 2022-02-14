<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * 8-3 : Copropriétés faisant l’objet d’une subvention de l’Anah
 */
class CD
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'logements', 'partsPrecarite'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        $m = $data['logements'];
        $np = $data['logements'] * $data['partsPrecarite'];

        return $v * $np / $m;
    }
}
