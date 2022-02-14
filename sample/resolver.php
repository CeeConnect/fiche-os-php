<?php

include_once '../vendor/autoload.php';

use CeeConnect\FicheOS\FicheResolver;
use CeeConnect\FicheOS\BonificationResolver;
use CeeConnect\FicheOS\PrecariteResolver;
use CeeConnect\FicheOS\Value\Value;

$data = [
    'dateEngagement' => new \DateTime('2022-05-01'),
    'zoneClimatique' => Value::ZONE_CLIMATIQUE_H1,
    'surfaceIsolant' => 100,
    'categorieRessource' => Value::CATEGORIE_RESSOURCE_TRES_MODESTE
];

$ficheResolver = new FicheResolver;
$ficheResolver('BAR-EN-103', $data);

$bonificationResolver = new BonificationResolver;
$bonificationResolver('CDP', 'BAR-EN-103', $ficheResolver->getCee(), $data);

$precariteResolver = new PrecariteResolver;
$precariteResolver('R1', $bonificationResolver->getCee(), $data);

var_dump($ficheResolver);
var_dump($bonificationResolver);
var_dump($precariteResolver);
