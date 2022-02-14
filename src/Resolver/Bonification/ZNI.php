<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000043382171
 */
class ZNI
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee'];
    }

    public static function get(array $data): ?float
    {
        return $data['cee'] * 2;
    }
}
