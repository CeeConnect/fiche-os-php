<?php

include_once '../vendor/autoload.php';

use CeeConnect\FicheOS\FicheRepository;
use CeeConnect\FicheOS\FicheResolver;

$fiches = FicheRepository::get();
$variables = [];

function getClass ($fiche) {
    $namespace = [
        'CeeConnect\FicheOS\Resolver\Agri',
        'CeeConnect\FicheOS\Resolver\Bar',
        'CeeConnect\FicheOS\Resolver\Bat',
        'CeeConnect\FicheOS\Resolver\Ind',
        'CeeConnect\FicheOS\Resolver\Res',
        'CeeConnect\FicheOS\Resolver\Tra'
    ];

    $className = \str_replace(' ', '', \ucwords(\str_replace('-', ' ', \strtolower($fiche))));

    foreach ($namespace as $namespace) {
        $class = $namespace . '\\' . $className;
        if (\class_exists($class)) {
            return $class;
        }
    }
    return null;
}

foreach ($fiches as $fiche) {
    if (!$class = getClass($fiche->code)) {
        continue;
    }
    foreach ($class::map() as $item) {
        if (!\array_key_exists($item, $variables)) {
            $variables[$item] = [];
        }
        $variables[$item][] = $fiche->code;
    }
}

var_dump($variables);
