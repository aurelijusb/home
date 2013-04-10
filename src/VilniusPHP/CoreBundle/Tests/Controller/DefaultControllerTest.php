<?php

namespace VilniusPHP\CoreBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * @group integration
 */
class DefaultControllerTest extends WebTestCase
{
    public function testNextEventOnIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(1, $crawler->filter('h1:contains("#3 susitikimas")')->count());
    }

    public function testEventsListOnIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(3, $crawler->filter('div.event')->count());
    }
}
