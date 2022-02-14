<?php

namespace CeeConnect\FicheOS;

use CeeConnect\FicheOS\Entity\Secteur as Entity;

class SecteurRepository
{
    private static function db(): array
    {
        return \json_decode(file_get_contents(__DIR__ . '/../data/secteur.json'), true);
    }

    public static function get(): iterable
    {
        return \array_map(function (array $item) {
            return self::dataTransformer($item);
        }, self::db());
    }

    public static function getOne(string $code): null|Entity
    {
        $results = \array_filter(self::db(), function($item) use ($code) {
            return \array_key_exists('code', $item) && $item['code'] === $code;
        });

        return $results ? self::dataTransformer(\current($results)) : null;
    }

    private static function dataTransformer(array $data): Entity
    {
        return new Entity($data['code'], $data['nom']);
    }
}
