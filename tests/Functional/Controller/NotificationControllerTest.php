<?php


namespace App\Tests\Functional\Controller;


use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NotificationControllerTest extends  WebTestCase
{
    public function testGetNotificationsAction()
    {
        $clientId = "13";

        $client = static::createClient();
        $client->request('GET', '/users/'. $clientId .'/notifications');
        echo $client->getResponse()->getContent();
        die;
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }
}