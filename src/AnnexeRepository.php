<?php

namespace CeeConnect\FicheOS;

class AnnexeRepository
{
    private static function db(): array
    {
        return \json_decode(file_get_contents(__DIR__ . '/../data/annexe.json'), true);
    }

    public static function get(): array
    {
        return self::db();
    }
}
