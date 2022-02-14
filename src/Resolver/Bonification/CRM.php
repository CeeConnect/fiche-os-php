<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000043382189
 */
class CRM
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'bonificationRenovationPerformante', 'categorieRessource'];
    }

    public static function get(array $data): ?float
    {
        $base = $data['cee'] / 18;
        $modeste = \in_array($data['categorieRessource'], [Value::CATEGORIE_RESSOURCE_TRES_MODESTE, Value::CATEGORIE_RESSOURCE_MODESTE]);

        if ($data['bonificationRenovationPerformante'] === true) {
            return $modeste ? $base * 54 : $base * 46;
        } else if ($data['bonificationRenovationPerformante'] === false) {
            return $modeste ? $base * 38 : $base * 30;
        } else {
            return null;
        }
    }
}
