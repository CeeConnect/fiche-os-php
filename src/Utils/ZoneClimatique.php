<?php

namespace CeeConnect\FicheOS\Utils;

/**
 * @see https://www.ecologie.gouv.fr/sites/default/files/La%20r%C3%A9partition%20des%20d%C3%A9partements%20par%20zone%20climatique.pdf
 * @see https://www.legifrance.gouv.fr/loda/article_lc/LEGIARTI000030077398
 */
class ZoneClimatique
{
    const DEPARTEMENTS_ZONE_CLIMATIQUE_H1 = [
        '01','02','03','05','08','10','14','15','19','21','23','25','27','28','38',
        '39','42','43','45','51','52','54','55','57','58','59','60','61','62','63',
        '67','68','69','70','71','73','74','75','76','77','78','80','87','88','89',
        '90','91','92','93','94','95', '975'
    ];
    const DEPARTEMENTS_ZONE_CLIMATIQUE_H2 = [
        '04','07','09','12','16','17','18','22','24','26','29','31','32','33','35',
        '36','37','40','41','44','46','47','48','49','50','53','56','64','65','72',
        '79','81','82','84','85','86'
    ];
    const DEPARTEMENTS_ZONE_CLIMATIQUE_H3 = [
        '06','11','13','2A','2B','20','30','34','66','83', '971', '972', '973', '974', '976'
    ];

    public static function toZoneClimatique(?string $codeDepartement): ?string
    {
        if (\in_array($codeDepartement, self::DEPARTEMENTS_ZONE_CLIMATIQUE_H1)) {
            return 'H1';
        }
        if (\in_array($codeDepartement, self::DEPARTEMENTS_ZONE_CLIMATIQUE_H2)) {
            return 'H2';
        }
        if (\in_array($codeDepartement, self::DEPARTEMENTS_ZONE_CLIMATIQUE_H3)) {
            return 'H3';
        }
        return null;
    }
}
