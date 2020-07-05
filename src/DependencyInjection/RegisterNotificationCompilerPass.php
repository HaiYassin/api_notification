<?php

namespace App\DependencyInjection;

use App\Strategy\NotificationContentTypeStrategy;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Class RegisterNotificationCompilerPass
 */
class RegisterNotificationCompilerPass implements CompilerPassInterface
{
    const DEFINITION_STRATEGY_SERVICE = 'app_notification_formatting';
    const DEFINITION_HAVE_TO_CALL_THIS_METHODE = 'addNotificationContentFormatting';

    // Definition de la classe de la strategy
    protected $notificationContentTypeStrategy = NotificationContentTypeStrategy::class;

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        //Definition our Strategy
        $notificationStrategyDefinition = $container->getDefinition($this->notificationContentTypeStrategy);

        //Get all services tagged by 'app_notification_formatting'
        $notificationsFormatting = $container->findTaggedServiceIds(self::DEFINITION_STRATEGY_SERVICE);

        foreach ($notificationsFormatting as $notificationFormatting => $tags ) {

            foreach ($tags as $tag) {
                // Get the definition to our Child Itération des services du service.yml taggé par le self::DEFINITION_STRATEGY_SERVICE
                $notificationFormattingService = $container->getDefinition($notificationFormatting);

                // Assign the self::DEFINITION_HAVE_TO_CALL_THIS_METHODE function name to our child strategy
                $notificationStrategyDefinition->addMethodCall(
                    self::DEFINITION_HAVE_TO_CALL_THIS_METHODE,
                    [
                        $tag['type'],
                        $notificationFormattingService
                    ]
                );
            }
        }
    }
}
