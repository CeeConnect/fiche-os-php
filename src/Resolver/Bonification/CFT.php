<?php

namespace CeeConnect\FicheOS\Resolver\Bonification;

use CeeConnect\FicheOS\Resolver\ResolverTrait;
use CeeConnect\FicheOS\Value\Value;

/**
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000043382195
 * 
 * TODO : Vérifier l'éligibilité de la bonification au GPL
 */
class CFT
{
    use ResolverTrait;

    public static function map(): array
    {
        return ['cee', 'fiche', 'energieChauffage'];
    }

    public static function get(array $data): ?float
    {
        $fioulOuCharbon = \in_array($data['energieChauffage'], [Value::ENERGIE_CHAUFFAGE_CHARBON, Value::ENERGIE_CHAUFFAGE_FIOUL]);
        $gaz = \in_array($data['energieChauffage'], [Value::ENERGIE_CHAUFFAGE_GAZ_NATUREL, Value::ENERGIE_CHAUFFAGE_GPL]);

        switch ($data['fiche']) {
            case 'BAT-TH-102':
                return $fioulOuCharbon ? $data['cee'] * 2 : null;
            case 'BAT-TH-113 ':
                if ($gaz) {
                    return $data['cee'] * 3;
                } else if ($fioulOuCharbon) {
                    return $data['cee'] * 4;
                } else {
                    return null;
                }
            case 'BAT-TH-127':
                if ($gaz) {
                    return $data['cee'] * 3;
                } else if ($fioulOuCharbon) {
                    return $data['cee'] * 4;
                } else {
                    return null;
                }
            case 'BAT-TH-140':
                if ($gaz) {
                    return $data['cee'] * 1.3;
                } else if ($fioulOuCharbon) {
                    return $data['cee'] * 2;
                } else {
                    return null;
                }
            case 'BAT-TH-141':
                if ($gaz) {
                    return $data['cee'] * 1.3;
                } else if ($fioulOuCharbon) {
                    return $data['cee'] * 2;
                } else {
                    return null;
                }
            default:
                return null;
        }
    }
}
