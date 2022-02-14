<?php

namespace CeeConnect\FicheOS\Resolver;

trait ResolverTrait
{
    public function __invoke(array $data): ?float
    {
        $map = \array_flip(self::map());
        $map = \array_fill_keys(\array_keys($map), null);
        return self::get(\array_intersect_key(\array_merge($map,$data), $map));
    }

    public abstract static function get(array $data): ?float;
    public abstract static function map(): array;
}
