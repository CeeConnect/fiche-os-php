<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000043382192
 */
class CRC
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'bonificationChauffageECS', 'bonificationENR'];
    }

    public static function get(array $data): ?float
    {
        $base = $data['cee'] / 18;

        if ($data['bonificationChauffageECS'] === true) {
            if ($data['bonificationENR'] === true) {
                return $base * 77;
            } else if ($data['bonificationENR'] === false) {
                return $base * 46;
            } else {
                return null;
            }
        } else if ($data['bonificationChauffageECS'] === false) {
            if ($data['bonificationENR'] === true) {
                return $base * 61;
            } else if ($data['bonificationENR'] === false) {
                return $base * 38;
            } else {
                return null;
            }
        } else {
            return null;
        }
    }
}
