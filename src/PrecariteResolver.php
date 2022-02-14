<?php

namespace CeeConnect\FicheOS;

class PrecariteResolver
{
    private ?float $ceeClassique = null;
    private ?float $ceePrecarite = null;

    /**
     * @param string Code du mode de prise en compte de la précarit énergétique
     * @param float Volume de CEE forfaitaire calculé par la FOS
     * @param array Données d'entrée
     */
    public function __invoke(string $mode, float $cee, array $data): void
    {
        $class = self::namespace() . '\\' . $mode;

        if (\class_exists($class)) {
            $data['cee'] = $cee;
            $resolver = new $class;
            $this->ceePrecarite = $resolver($data);
            $this->ceeClassique = $cee - $this->ceePrecarite;
        }
    }

    private static function namespace(): string
    {
        return 'CeeConnect\FicheOS\Resolver\Precarite';
    }

    public function getCeeClassique(): ?float
    {
        return $this->ceeClassique;
    }

    public function getCeePrecarite(): ?float
    {
        return $this->ceePrecarite;
    }
}
