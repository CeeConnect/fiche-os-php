<?php

include_once '../vendor/autoload.php';

use CeeConnect\FicheOS\BonificationRepository;
use CeeConnect\FicheOS\FicheRepository;
use CeeConnect\FicheOS\SecteurRepository;

$secteurs = SecteurRepository::get();
$secteur = SecteurRepository::getOne('BAR');
$bonifications = BonificationRepository::get();
$bonification = BonificationRepository::getOne('CDP');
$fiches = FicheRepository::get();
$search = FicheRepository::getBy(['secteur' => 'BAR', 'sousSecteur' => 'Enveloppe', 'dom' => true, 'maison' => true ]);
$fiche = FicheRepository::getOne('BAR-EN-101');

var_dump($secteurs);
var_dump($secteur);
var_dump($bonifications);
var_dump($bonification);
var_dump($fiches);
var_dump($search);
var_dump($fiche);
