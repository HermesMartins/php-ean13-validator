<?php namespace HermesMartins\EAN13;
/**
 * Created by PhpStorm.
 * User: hermes d. martins
 * Date: 29/01/18
 * Time: 16:57
 */

class EAN13Validator
{

    /**
     * @param $ean
     */
    public function isAValidEAN13($ean)
    {
        $sumEvenIndexes = 0;
        $sumOddIndexes  = 0;

        $eanAsArray = array_map('intval', str_split($ean));

        if (!$this->has13Numbers($eanAsArray)) {
            return false;
        };

        for ($i = 0; $i < count($eanAsArray)-1; $i++) {
            if ($i % 2 === 0) {
                $sumEvenIndexes += $eanAsArray[$i];
            } else {
                $sumOddIndexes += $eanAsArray[$i];
            }
        }

        $rest = ((3 * $sumOddIndexes) + $sumEvenIndexes) % 10;

        return $rest === $eanAsArray[12];
    }

    /**
     * @param array $ean
     * @return bool
     */
    private function has13Numbers(array $ean)
    {
        return count($ean) === 13;
    }
}