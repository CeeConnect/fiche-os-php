<?php

namespace CeeConnect\FicheOS\Entity;

class Secteur
{
    public string $code;
    public string $nom;

    public function __construct(string $code, string $nom)
    {
        $this->code = $code;
        $this->nom = $nom;
    }
}
