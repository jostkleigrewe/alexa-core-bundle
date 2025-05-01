<?php

declare(strict_types=1);

namespace Jostkleigrewe\AlexaCoreBundle;

use Alt\AlexaIntentDispatcherService;
use Jostkleigrewe\AlexaCoreBundle\Intent\IntentInterface;
use Jostkleigrewe\AlexaCoreBundle\Service\AlexaIntentDispatcher;
use Override;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

/**
 * Class JostkleigreweAlexaCoreBundle
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class JostkleigreweAlexaCoreBundle extends AbstractBundle
{
    /**
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     */
    public function build(ContainerBuilder $container): void
    {
        //  add service-tags for intents
        $container->registerForAutoconfiguration(IntentInterface::class)
            ->addTag(AlexaIntentDispatcher::SERVICE_TAG)
        ;

        parent::build($container);
    }

    /**
     * New possibility to configure the bundle (since Symfony 6.1)
     *
     */
    public function configure(DefinitionConfigurator $definition): void
    {
        $definition->rootNode()
            ->children()
                ->arrayNode('allowed_application_ids')
                    ->prototype('scalar')->end()
                    ->defaultValue([])
                    ->info('Application Ids that are allowed')
                ->end()
            ->end()
        ;
    }

    /**
     *  $config is the bundle Configuration that you usually process in
     *  ExtensionInterface::load() but already merged and processed
     */
    #[\Override]
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder
    ): void {
        $container->import('../config/services.yaml');

        // set parameter allowed_application_ids for use in config for services
        $container->parameters()->set(
            'jostkleigrewe_alexa_core.allowed_application_ids',
            $config['allowed_application_ids']
        );
    }

    /**
     * This directory structure requires to configure the bundle path to its root directory
     *
     * @return string
     */
    #[Override]
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
