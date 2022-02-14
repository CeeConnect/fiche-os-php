<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * Cas de 
 */
class CDP
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'ceeBonifie', 'menages', 'menagesModestes', 'menagesPrecaires', 'codeDepartement'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        $m = $data['menages'];
        $nm = $data['menagesModestes'];
        $np = $data['menagesPrecaires'];

        return null;
    }
}
