<?php

class CFileValidatorTest extends CTestCase
{

    public function providerSizeToBytes()
    {

        return array(
            array('100M', 100 * 1024 * 1024),
            array('100,5M', 100 * 1024 * 1024),
            array('150m', 150 * 1024 * 1024),
            array('150.5m', 150 * 1024 * 1024),
            array('500K', 500 * 1024),
            array('540.5K', 540 * 1024),
            array('70k', 70 * 1024),
            array('70,2k', 70 * 1024),
            array('1G', 1 * 1024 * 1024 * 1024),
            array('1.5g', 1 * 1024 * 1024 * 1024),
            array('2g', 2 * 1024 * 1024 * 1024),
            array('1.2G', 1 * 1024 * 1024 * 1024),
            array('100500', 100500),
            array('9000', 9000),
            array(null, null),
            array('', null),
        );
    }

    /**
     * @dataProvider providerSizeToBytes
     *
     * @param string  $sizeString
     * @param integer $assertion
     */
    public function testSizeToBytes($sizeString, $assertion)
    {

        $fileValidator = new CFileValidator();
        $this->assertEquals($assertion, $fileValidator->sizeToBytes($sizeString));
    }
}
