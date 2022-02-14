<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * 8-5 : autres opérations
 */
class R2
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'menages', 'menagesPrecaires'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        $m = $data['menages'];
        $np = $data['menagesPrecaires'];

        return $v * $np / $m;
    }
}
