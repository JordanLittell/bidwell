<?php
require_once('simpletest/autorun.php');
require_once('simpletest/web_tester.php');

class MySiteTest extends WebTestCase {
    
    function test_home_page_has_pricing_link() {
        $this->get('http://localhost/bidwell3.0/');
        $this->assertTitle('Bidwell Self Storage');
        $this->clickLink('Pricing');
        $this->assertTitle('Bidwell Self Storage');  
    }
}

class MySiteTest2 extends WebTestCase{
    function pricing_page_displays_price() {
    	$this->get('http://localhost/bidwell3.0/pricing/');
    	$this->assertTitle("Bidwell Self Stora");
    }
}

?>