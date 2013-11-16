<?php

class CApplicationComponentTest extends CTestCase
{

    public function testInitialization()
    {

        $c = $this->getMockForAbstractClass('CApplicationComponent', array('init', 'getIsInitialized'), '', null);
        $c->expects($this->any())
            ->method('getIsInitialized')
            ->will($this->returnValue(false));
        $this->assertFalse($c->getIsInitialized());
        $c->init();
        $this->assertTrue($c->getIsInitialized());
    }
}
