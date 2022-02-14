<?php

namespace CeeConnect\FicheOS;

use CeeConnect\FicheOS\Entity\Bonification as Entity;

class BonificationRepository
{
    private static function db(): array
    {
        return \json_decode(file_get_contents(__DIR__ . '/../data/bonification.json'), true);
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
        return new Entity(
            $data['code'],
            $data['nom'],
            new \DateTime($data['dateDebut']),
            $data['dateFin'] ? new \DateTime($data['dateFin']) : null
        );
    }
}
