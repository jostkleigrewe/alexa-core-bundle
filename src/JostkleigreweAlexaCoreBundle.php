<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle;

use Jostkleigrewe\AlexaCoreBundle\DependencyInjection\Compiler\IntentPass;
use Jostkleigrewe\AlexaCoreBundle\Intent\IntentInterface;
use Jostkleigrewe\AlexaCoreBundle\Service\IntentService;
use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class JostkleigreweAlexaCoreBundle
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2023 Sven Jostkleigrewe
 */
class JostkleigreweAlexaCoreBundle extends Bundle
{

    /**
     * {@inheritdoc}
     *
     * This method can be overridden to register compilation passes,
     * other extensions, ...
     */
    public function build(ContainerBuilder $container): void
    {

        //  add compiler pass
        $container->addCompilerPass(new IntentPass());

        //  add service-tags
        $container->registerForAutoconfiguration(IntentInterface::class)
            ->addTag(IntentService::SERVICE_TAG)
        ;

        parent::build($container);
    }

    /**
     * New possibility to configure the bundle (since Symfony 6.1)
     *
     */
    public function configure(DefinitionConfigurator $definition): void
    {
        // loads config definition from a file
//        $definition->import('../config/definition.php');

        // loads config definition from multiple files (when it's too long you can split it)
//        $definition->import('../config/definition/*.php');

        // if the configuration is short, consider adding it in this class
        $definition->rootNode()
            ->children()
                ->scalarNode('foo')
                    ->defaultValue('default_foo')
                    ->info('foo')
                ->end()
                ->scalarNode('bar')
                    ->defaultValue('default_bar')
                    ->info('bar')
                ->end()
            ->end()
        ;
    }


    /**
     *  $config is the bundle Configuration that you usually process in
     *  ExtensionInterface::load() but already merged and processed
     */
    public function loadExtension(
        array $config,
        ContainerConfigurator $container,
        ContainerBuilder $builder): void
    {
//
//        $configuration = new Configuration();
//
//        $config = $this->processConfiguration($configuration, $configs);
//
//        foreach ($config as $key => $value) {
//            $container->setParameter($this->getAlias().'.'.$key, $value);
//        }
//
//        $locator = new FileLocator(__DIR__ . '/../Resources/config/');
//        $loader  = new XmlFileLoader($container, $locator);
//
//        $loader->load('services.xml');

        $container->import('../config/services.yaml');
    }

    /**
     * This directory structure requires to configure the bundle path to its root directory
     *
     * @return string
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}