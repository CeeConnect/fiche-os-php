<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

class BarTh162
{
    use ResolverTrait;

    public static function map(): array
    {
        return [];
    }

    public static function get(array $data): ?float
    {
        return 20900;
    }
}
