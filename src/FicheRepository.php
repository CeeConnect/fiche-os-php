<?php

namespace CeeConnect\FicheOS;

use CeeConnect\FicheOS\Entity\AbstractFiche as Entity;
use CeeConnect\FicheOS\Entity\FicheAgri;
use CeeConnect\FicheOS\Entity\FicheBar;
use CeeConnect\FicheOS\Entity\FicheBat;
use CeeConnect\FicheOS\Entity\FicheInd;
use CeeConnect\FicheOS\Entity\FicheRes;
use CeeConnect\FicheOS\Entity\FicheTra;
use CeeConnect\FicheOS\Entity\Bonification;
use CeeConnect\FicheOS\Entity\Domaine;

class FicheRepository
{
    private static function db(): array
    {
        return \json_decode(file_get_contents(__DIR__ . '/../data/fiche.json'), true);
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

    public static function getBy(array $filters): iterable
    {
        return \array_map(function (array $item) {
            return self::dataTransformer($item);
        }, \array_filter(self::db(), function($item) use ($filters) {
            foreach ($filters as $key => $value) {
                if (!\array_key_exists($key, $item) || $value !== $item[$key]) {
                    return false;
                }
            }
            return true;
        }));
    }

    private static function dataTransformer(array $data): ?Entity
    {
        switch ($data['secteur']) {
            case 'AGRI':
                $className = FicheAgri::class;
                break;
            case 'BAR':
                return new FicheBar(
                    $data['code'],
                    $data['secteur'],
                    $data['sousSecteur'],
                    $data['intitule'],
                    $data['nom'],
                    $data['metropole'],
                    $data['dom'],
                    $data['maison'],
                    $data['appartement'],
                    $data['immeuble'],
                    new \DateTime($data['dateDebut']),
                    $data['dateFin'] ? new \DateTime($data['dateFin']) : null,
                    $data['version'],
                    \array_map(function(array $item) {
                        return self::domainDataTransformer($item);
                    }, $data['domainesRequis']),
                    \array_map(function(array $item) {
                        return self::bonificationDataTransformer($item);
                    }, $data['bonifications'])
                );
            case 'BAT':
                $className = FicheBat::class;
                break;
            case 'IND':
                $className = FicheInd::class;
                break;
            case 'RES':
                $className = FicheRes::class;
                break;
            case 'TRA':
                $className = FicheTra::class;
                break;
            default:
                $className = null;
        }
        return $className ? new $className(
            $data['code'],
            $data['secteur'],
            $data['sousSecteur'],
            $data['intitule'],
            $data['nom'],
            $data['metropole'],
            $data['dom'],
            new \DateTime($data['dateDebut']),
            $data['dateFin'] ? new \DateTime($data['dateFin']) : null,
            $data['version'],
            \array_map(function(array $item) {
                return self::domainDataTransformer($item);
            }, $data['domainesRequis']),
            \array_map(function(array $item) {
                return self::bonificationDataTransformer($item);
            }, $data['bonifications'])
        ) : null;
    }

    private static function domainDataTransformer(array $data): Domaine
    {
        return new Domaine(
            $data['domaine'], $data['complement'], $data['personneMorale'], $data['personnePhysique']
        );
    }

    private static function bonificationDataTransformer(array $data): Bonification
    {
        return BonificationRepository::getOne($data['bonification'] ?? null);
    }
}
