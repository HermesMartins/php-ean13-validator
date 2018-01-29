<?php
/**
 * Created by PhpStorm.
 * User: hermes d. martins
 * Date: 29/01/18
 * Time: 17:01
 */

use HermesMartins\EAN13\EAN13Validator;

class EAN13Test extends PHPUnit_Framework_TestCase
{
    public function test_is_a_valid_ean_13()
    {
        $ean13ValidatorModel = new EAN13Validator();
        $this->assertTrue($ean13ValidatorModel->isAValidEAN13(7890001804645));
    }

    public function test_is_a_invalid_ean_13()
    {
        $ean13ValidatorModel = new EAN13Validator();
        $this->assertFalse($ean13ValidatorModel->isAValidEAN13(7990001804645));
    }

    public function test_has_more_than_13_numbers()
    {
        $ean13ValidatorModel = new EAN13Validator();
        $this->assertFalse($ean13ValidatorModel->isAValidEAN13(799000180464534343));
    }

    public function test_has_less_than_13_numbers()
    {
        $ean13ValidatorModel = new EAN13Validator();
        $this->assertFalse($ean13ValidatorModel->isAValidEAN13(1243455));
    }
}