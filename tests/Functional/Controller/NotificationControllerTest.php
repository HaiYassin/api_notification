<?php


namespace App\Tests\Functional\Controller;


use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class NotificationControllerTest
 */
class NotificationControllerTest extends  WebTestCase
{
    public function testGetNotificationsAction()
    {
        self::bootKernel();
        $container = self::$kernel->getContainer();

        /** @var User $user */
        $user = $container->get('doctrine')->getRepository(User::class)->findOneBy([
            'name' => 'USER_1'
        ]);

        $client = static::createClient();

        $client->request('GET', '/api/users/'. $user->getId() .'/notifications');
        $response = $client->getResponse();

        $this->assertResponseIsSuccessful();
        $this->assertResponseStatusCodeSame(Response::HTTP_OK, $response->getStatusCode());
        $this->assertResponseHeaderSame('content-type', 'application/json');
        $this->assertJson($response->getContent());
    }
}