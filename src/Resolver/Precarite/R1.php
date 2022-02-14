<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * 8.1 bis : le ménage en situation de précarité énergétique est l’unique bénéficiaire de l'opération
 */
class R1
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        return $v;
    }
}
