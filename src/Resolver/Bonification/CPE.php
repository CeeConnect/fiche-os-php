<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000041893428
 */
class CPE
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'dureeGarantie', 'economiesEnergieFinaleGaranties'];
    }

    public static function get(array $data): ?float
    {
        if ($data['dureeGarantie'] < 10) {
            return $data['cee'] * (1 + 2 * $data['economiesEnergieFinaleGaranties']);
        } else if ($data['dureeGarantie'] >= 10) {
            return $data['cee'] * (1 + 3 * $data['economiesEnergieFinaleGaranties']);
        } else {
            return null;
        }
    }
}
