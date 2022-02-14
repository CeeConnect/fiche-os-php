<?php

namespace CeeConnect\FicheOS;

class BonificationResolver
{
    private ?float $cee = null;

    /**
     * @param string Code de la bonification
     * @param string Code de la fiche d'opération standardisée
     * @param float Volume de CEE forfaitaire calculé par la FOS
     * @param array Données d'entrée
     */
    public function __invoke(string $bonification, string $fiche, float $cee, array $data): void
    {
        $class = self::namespace() . '\\' . $bonification;

        if (\class_exists($class)) {
            $data['fiche'] = $fiche;
            $data['cee'] = $cee;
            $resolver = new $class;
            $this->cee = $resolver($data);
        }
    }

    private static function namespace(): string
    {
        return 'CeeConnect\FicheOS\Resolver\Bonification';
    }

    public function getCee(): ?float
    {
        return $this->cee;
    }
}
