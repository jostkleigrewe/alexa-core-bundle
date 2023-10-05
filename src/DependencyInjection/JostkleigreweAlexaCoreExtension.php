<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\ExtensionInterface;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class Jostkleigrewe
 * 
 * @package   Jostkleigrewe\AlexaCoreBundle\DependencyInjection
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class JostkleigreweAlexaCoreExtension extends Extension implements ExtensionInterface
{

    /**
     * Responds to the migrations configuration parameter.
     *
     * @param  array            $configs
     * @param  ContainerBuilder $container
     * @throws \Exception
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();

        $config = $this->processConfiguration($configuration, $configs);

        foreach ($config as $key => $value) {
            $container->setParameter($this->getAlias().'.'.$key, $value);
        }

        $locator = new FileLocator(__DIR__ . '/../Resources/config/');
        $loader  = new XmlFileLoader($container, $locator);

        $loader->load('services.xml');
    }

    /**
     * @return string
     */
    public function getAlias(): string
    {
        return 'amelia_alexa_core';
    }
}
