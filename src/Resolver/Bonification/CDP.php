<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000044200001
 * 
 * TODO : Vérifier l'éligibilité de la bonification au GPL
 */
class CDP
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['fiche', 'categorieRessource', 'surfaceIsolant'];
    }

    public static function get(array $data): ?float
    {
        $modeste = \in_array($data['categorieRessource'], [Value::CATEGORIE_RESSOURCE_TRES_MODESTE, Value::CATEGORIE_RESSOURCE_MODESTE]);

        switch ($data['fiche']) {
            case 'BAR-EN-101':
                return $modeste ? 1600 * $data['surfaceIsolant'] : 1400 * $data['surfaceIsolant'];
            case 'BAR-EN-103':
                return $modeste ? 1600 * $data['surfaceIsolant'] : 1400 * $data['surfaceIsolant'];
            case 'BAR-TH-104':
                return $modeste ? 727300 : 454500;
            case 'BAR-TH-113':
                return $modeste ? 727300 : 454500;
            case 'BAR-TH-143':
                return $modeste ? 727300 : 454500;
            case 'BAR-TH-159':
                return $modeste ? 727300 : 454500;
            case 'BAR-TH-137':
                return $modeste ? 127300 : 81800;
            case 'BAR-TH-112':
                return $modeste ? 145500 : 90900;
            case 'BAT-TH-163':
                return $modeste ? 127300 : 81800;
            default:
                return null;
        }
    }
}
