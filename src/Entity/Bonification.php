<?php

namespace CeeConnect\FicheOS\Entity;

class Bonification
{
    public string $code;
    public string $nom;
    public \DateTimeInterface $dateDebut;
    public ?\DateTimeInterface $dateFin;

    public function __construct(
        string $code,
        string $nom,
        \DateTimeInterface $dateDebut,
        ?\DateTimeInterface $dateFin
    )
    {
        $this->code = $code;
        $this->nom = $nom;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
    }

}
