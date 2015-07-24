<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/22/15
 * Time: 4:57 PM
 */

namespace Phenom\WafeeeBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class StaticPageControllerTest extends WebTestCase {
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertTrue($crawler->filter('html:contains("Homepage")')->count() > 0);

        $this->assertTrue($client->getResponse()->isSuccessful());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}
