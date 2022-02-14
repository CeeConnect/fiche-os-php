<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\AnnexeRepository;
use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * 8-4 : Cas où l’opération concerne un quartier prioritaire de la politique de la ville
 */
class QPV
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'logements', 'codeDepartement'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        $m = $data['logements'];

        $annexe = \array_filter(AnnexeRepository::get(), function (array $item) use ($data) {
            return $item['codeDepartement'] === $data['codeDepartement'];
        });

        $rp = !empty($annexe) ? \current($annexe)['facteurPrecarite'] : null;

        return $v * ($m * $rp) / $m;
    }
}
