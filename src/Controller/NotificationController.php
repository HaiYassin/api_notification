<?php


namespace App\Controller;


use App\Entity\User;
use App\Entity\UserNotification;
use App\Factory\ContentFactory;
use App\Interfaces\NotificationContentFormatStrategyInterface;
use App\Model\Content;
use App\Entity\Repository\UserNotificationRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

/**
 * Class NotificationController
 * 
 * @Route("/api", name="api_")
 */
class NotificationController extends AbstractController
{
    /**
     * @Route(
     *     "/users/{id}/notifications",
     *     name="user_id_notifications",
     *     methods={"GET"}
     * )
     *
     * @param Content $content
     * @param ContentFactory $contentFactory
     * @param NotificationContentFormatStrategyInterface $notificationContentFormatStrategy
     * @param Request $request
     * @param SerializerInterface $serializer
     * @param User $user
     *
     * @return string
     */
    public function getNotificationsAction(
        Content $content,
        ContentFactory $contentFactory,
        NotificationContentFormatStrategyInterface $notificationContentFormatStrategy,
        Request $request,
        SerializerInterface $serializer,
        User $user
    )
    {
        $contents = [];

        /** @var UserNotification[] $notifications */
        $userNotifications = $this->getDoctrine()->getRepository(UserNotification::class)->findBy(
            ['user' => $user->getId(), 'view' => true ],
            ['createdAt' => 'desc']
        );

        foreach ($userNotifications as $userNotification){

            $content = $contentFactory->createContentModel($userNotification->getNotification());
            $userNotification->getNotification()->setContent($content);

            array_push($contents, $notificationContentFormatStrategy->format($userNotification->getNotification()));
        }

        $dataSerialized = $serializer->serialize($contents, 'json');

        return new JsonResponse(
            $dataSerialized,
            Response::HTTP_OK,
            ['Content-type' => 'application/json'],
            true
        );
    }
}