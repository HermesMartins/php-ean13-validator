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
    protected $ean13ValidatorModel;

    public function setUp()
    {
        $this->ean13ValidatorModel = new EAN13Validator();
    }

    public function test_is_a_valid_ean_13()
    {
//        $this->assertTrue($this->ean13ValidatorModel->isAValidEAN13(7890001804645));

        $this->assertTrue($this->ean13ValidatorModel->isAValidEAN13(7891153041407));
    }

    public function test_is_a_invalid_ean_13()
    {
        $this->assertFalse($this->ean13ValidatorModel->isAValidEAN13(7990001804645));
    }

    public function test_has_more_than_13_numbers()
    {
        $this->assertFalse($this->ean13ValidatorModel->isAValidEAN13(799000180464534343));
    }

    public function test_has_less_than_13_numbers()
    {
        $this->assertFalse($this->ean13ValidatorModel->isAValidEAN13(1243455));
    }

    public function test_has_invalid_characteres()
    {
        $invalidEan = '12#98*/+=;799000180464534343';
        $this->assertFalse($this->ean13ValidatorModel->isAValidEAN13($invalidEan));
    }

    public function test_invalid_ean_with_spaces()
    {
        $invalidEan = '   1243455  799000180464534343   ';
        $this->assertFalse($this->ean13ValidatorModel->isAValidEAN13($invalidEan));
    }
}