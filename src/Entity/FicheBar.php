<?php

namespace CeeConnect\FicheOS\Entity;

class FicheBar extends AbstractFiche
{
    public bool $maison;
    public bool $appartement;
    public bool $immeuble;

    public function __construct(
        string $code,
        string $secteur,
        string $sousSecteur,
        string $intitule,
        string $nom,
        bool $metropole,
        bool $dom,
        bool $maison,
        bool $appartement,
        bool $immeuble,
        \DateTimeInterface $dateDebut,
        ?\DateTimeInterface $dateFin,
        int $version,
        array $domainesRequis,
        array $bonifications
    )
    {
        $this->code = $code;
        $this->secteur = $secteur;
        $this->sousSecteur = $sousSecteur;
        $this->intitule = $intitule;
        $this->nom = $nom;
        $this->metropole = $metropole;
        $this->dom = $dom;
        $this->maison = $maison;
        $this->appartement = $appartement;
        $this->immeuble = $immeuble;
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->version = $version;
        $this->domainesRequis = $domainesRequis;
        $this->bonifications = $bonifications;
    }

}
