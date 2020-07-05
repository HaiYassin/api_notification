<?php


namespace App\DataFixtures;


use App\Entity\Notification;
use App\Entity\User;
use App\Entity\UserNotification;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

/**
 * Class AppFixtures
 */
class AppFixtures extends Fixture
{
    const ROLES = [
        'ROLE_USER',
        'ROLE_ADMIN'
    ];

    const CONTENTS_RELATED_TYPE = [
        'information' => [
            'track' => [
                "title" => 'Yes Baby Yes v',
                "img" => 'https://lh3.googleusercontent.com/proxy/wS7DONUPOMchMnJqo0Zx32A2v1G01vNyV5kTYJya73svD-c9M4QD4vmlmmGasAd1lIVYzKS0kGCzeIfGTcPAvXN6TFoKPA',
                "author" => 'Mo Horizons'
            ]
        ],
        'newness' => [
            'album' => [
                'title' => 'We go home together',
                "img" => 'https://static1.millenium.org/articles/6/33/65/76/@/1049538-vegeta-ssj-leak-article_m-1.jpg',
                "author" => 'Mo Horizons'
            ]
        ],
        'recommendation' => [
            'playlist' => [
                'title' => 'Urban Hits',
                'img' => 'https://www.mediacritik.com/wp-content/uploads/2019/04/luffy-wanted-poster.jpeg',
                'author' => 'Digster France'
            ]
        ],
        'shared' => [
            'podcast' => [
                'title' => 'La drole d\'humeur de pierre-emmanuel',
                'img' => 'https://vignette.wikia.nocookie.net/onepiece/images/1/1c/Usopp_Drum.png/revision/latest/scale-to-width-down/340?cb=20160424133817&path-prefix=fr'
            ]
        ]
    ];

    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 3; $i++) {
            foreach (self::ROLES as $role){

                $user = new User();

                $user
                    ->setName('USER_' . $i)
                    ->setImg('https://i.skyrock.net/8992/90898992/pics/3216399797_1_2_AbWeQIrc.jpg')
                    ->setPassword('pass_' . $i)
                    ->setRoles([$role])
                    ;

                $manager->persist($user);

                foreach (self::CONTENTS_RELATED_TYPE as $type => $contentRelated){

                    $notification = new Notification();
                    $notification
                        ->setContentType($type)
                        ->setContentRelated($contentRelated)
                        ->setDescription('test_' . $i )
                        ->setValidityTime($i)
                        ->setUser($user)
                        ->setCreatedAt(new \DateTime('now'))
                    ;

                    $manager->persist($notification);

                    $userNotification = new UserNotification();

                    $userNotification
                        ->setUser($user)
                        ->setNotification($notification)
                        ->setView(true)
                        ->setCreatedAt($notification->getCreatedAt())
                        ;

                    $manager->persist($userNotification);
                }
            }
        }

        $manager->flush();
    }
}
