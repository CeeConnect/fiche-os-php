<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh164
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cefInitial', 'cefProjet', 'surfaceHabitable'];
    }

    public static function get(array $data): ?float
    {
        return ($data['cefInitial'] - $data['cefProjet']) * $data['surfaceHabitable'] * 18;
    }
}
