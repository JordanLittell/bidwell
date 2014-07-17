<?php 

require_once('simpletest/autorun.php');
require_once('simpletest/web_tester.php');

class MySiteTest extends WebTestCase {
    
    function testHomePageHasContactDetailsLink() {
        $this->get('http://www.my-site.com/index.php');
        $this->assertTitle('My Home Page');
        $this->clickLink('Contact');
        $this->assertTitle('Contact me');
        $this->assertText('/Email me at/');
    }
}
	require_once('simpletest/autorun.php');

class CanAddUp extends UnitTestCase {
    function testOneAndOneMakesTwo() {
        $this->assertEqual(1 + 1, 2);
    }
}
	define("BASE_URL","/bidwell3.0/");
	define("ROOT_PATH",$_SERVER["DOCUMENT_ROOT"]."/bidwell3.0");
	
	?>