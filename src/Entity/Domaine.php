<?php

namespace CeeConnect\FicheOS\Entity;

class Domaine
{
    public string $domaine;
    public ?string $complement;
    public bool $personneMorale;
    public bool $personnePhysique;

    public function __construct(string $domaine, ?string $complement, bool $personneMorale, bool $personnePhysique)
    {
        $this->domaine = $domaine;
        $this->complement = $complement;
        $this->personneMorale = $personneMorale;
        $this->personnePhysique = $personnePhysique;
    }
}
