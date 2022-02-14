<?php

namespace CeeConnect\FicheOS\Resolver\Precarite;

use CeeConnect\FicheOS\AnnexeRepository;
use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * 8-2 : Opérations concernant au moins un logement locatif social
 */
class BS
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'logements', 'logementsHLM', 'menagesPrecaires', 'codeDepartement'];
    }

    public static function get(array $data): ?float
    {
        $v = $data['cee'];
        $m = $data['logements'];
        $n = $data['logementsHLM'];
        $np = $data['menagesPrecaires'];

        $annexe = \array_filter(AnnexeRepository::get(), function (array $item) use ($data) {
            return $item['codeDepartement'] === $data['codeDepartement'];
        });

        $rp = !empty($annexe) ? \current($annexe)['facteurPrecarite'] : null;

        return $v * ($np + $n * $rp) / $m;
    }
}
