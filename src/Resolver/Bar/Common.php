<?php

namespace CeeConnect\FicheOS\Resolver\Bar;

class Common
{
    public static function facteurCorrectifMaison(?float $surface, ?bool $min = false): ?float
    {
        if ($min) {
            if ($surface < 70) {
                return 0.5;
            } else if ($surface < 90) {
                return 0.7;
            } else if ($surface < 110) {
                return 1;
            } else if ($surface <= 130) {
                return 1.1;
            } else if ($surface > 130) {
                return 1.6;
            } else {
                return null;
            }
        } else {
            if ($surface < 35) {
                return 0.3;
            } else if ($surface < 60) {
                return 0.5;
            } else if ($surface < 70) {
                return 0.6;
            } else if ($surface < 90) {
                return 0.7;
            } else if ($surface < 110) {
                return 1;
            } else if ($surface <= 130) {
                return 1.1;
            } else if ($surface > 130) {
                return 1.6;
            } else {
                return null;
            }
        }
    }

    public static function facteurCorrectifAppartement(?float $surface): ?float
    {
        if ($surface < 35) {
            return 0.5;
        } else if ($surface < 60) {
            return 0.7;
        } else if ($surface < 70) {
            return 1;
        } else if ($surface < 90) {
            return 1.2;
        } else if ($surface < 110) {
            return 1.5;
        } else if ($surface <= 130) {
            return 1.9;
        } else if ($surface > 130) {
            return 2.5;
        } else {
            return null;
        }
    }
}
