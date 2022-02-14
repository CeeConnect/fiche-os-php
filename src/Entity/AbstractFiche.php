<?php

namespace CeeConnect\FicheOS\Entity;

abstract class AbstractFiche
{
    public string $code;
    public string $secteur;
    public string $sousSecteur;
    public string $intitule;
    public string $nom;
    public bool $metropole;
    public bool $dom;
    public \DateTimeInterface $dateDebut;
    public ?\DateTimeInterface $dateFin;
    public int $version;
    /** @var array|Domaine[] */
    public $domainesRequis = [];
    /** @var array|Bonification[] */
    public $bonifications = [];

    public function __construct(
        string $code,
        string $secteur,
        string $sousSecteur,
        string $intitule,
        string $nom,
        bool $metropole,
        bool $dom,
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
        $this->dateDebut = $dateDebut;
        $this->dateFin = $dateFin;
        $this->version = $version;
        $this->domainesRequis = $domainesRequis;
        $this->bonifications = $bonifications;
    }

}
