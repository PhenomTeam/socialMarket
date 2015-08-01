<?php
/**
 * Created by PhpStorm.
 * User: manhtoan
 * Date: 7/29/15
 * Time: 1:40 AM
 */

namespace Phenom\WafeeeBundle\Tests;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ApplicationAvailabilityFunctionalTest extends WebTestCase {

    /**
     * @dataProvider urlProvider
     */
    public function testPageIsSuccessful($url)
    {
        $client = $this->createClient();
        $client->request('GET', $url);

        $this->assertTrue($client->getResponse()->isSuccessful());
    }

    public function urlProvider()
    {
        return array(
            array('/'),
            array('/register'),
            array('/login'),
//            array('/user'),
        );
    }
}
