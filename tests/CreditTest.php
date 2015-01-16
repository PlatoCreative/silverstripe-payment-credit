<?php

class CreditTest extends SapphireTest {

  function setUp() {
    parent::setUp();
  }

  public function testClassConfig() {
		$processor = PaymentFactory::factory('Credit');
		$this->assertEquals(get_class($processor), 'CreditProcessor');
		$this->assertEquals(get_class($processor->gateway), 'CreditGateway');
		$this->assertEquals(get_class($processor->payment), 'Payment');
	}
}
