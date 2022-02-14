<?php

namespace CeeConnect\FicheOS;

class FicheResolver
{
    private ?float $cee = null;

    /**
     * @param string Code de la fiche d'opération standardisée
     * @param array Données d'entrée
     */
    public function __invoke(string $fiche, array $data): void
    {
        $className = \str_replace(' ', '', \ucwords(\str_replace('-', ' ', \strtolower($fiche))));

        foreach (self::namespaces() as $namespace) {
            $class = $namespace . '\\' . $className;
            if (\class_exists($class)) {
                $resolver = new $class;
                $this->cee = $resolver($data);
            }
        }
    }

    private static function namespaces(): array
    {
        return [
            'CeeConnect\FicheOS\Resolver\Agri',
            'CeeConnect\FicheOS\Resolver\Bar',
            'CeeConnect\FicheOS\Resolver\Bat',
            'CeeConnect\FicheOS\Resolver\Ind',
            'CeeConnect\FicheOS\Resolver\Res',
            'CeeConnect\FicheOS\Resolver\Tra'
        ];
    }

    public function getCee(): ?float
    {
        return $this->cee;
    }
}
