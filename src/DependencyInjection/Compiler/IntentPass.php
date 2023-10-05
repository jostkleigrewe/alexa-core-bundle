<?php

namespace Jostkleigrewe\AlexaCoreBundle\DependencyInjection\Compiler;

use Jostkleigrewe\AlexaCoreBundle\Intent\IntentChain;
use Jostkleigrewe\AlexaCoreBundle\Service\IntentService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class IntentPass
 * 
 * @package   Jostkleigrewe\AlexaCoreBundle\DependencyInjection\Compiler
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class IntentPass implements CompilerPassInterface
{

    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container): void
    {

        // always first check if the primary service is defined
        if (!$container->has(IntentChain::class)) {
            return;
        }

        $definition = $container->findDefinition(IntentChain::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds(IntentService::SERVICE_TAG);

        if (empty($taggedServices)) {
            return;
        }

        // add to the service
        foreach ($taggedServices as $id => $tags) {
            $definition->addMethodCall('addIntent', array(new Reference($id)));
        }
    }
}
