<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 * @package Jostkleigrewe\AlexaCoreBundle\DependencyInjection
 * @author Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class Configuration implements ConfigurationInterface
{

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder('amelia_alexa_core');

        $treeBuilder->getRootNode()
            ->children()
                ->scalarNode('foo')->defaultValue('default_foo')->end()
                ->scalarNode('bar')->defaultValue('default_bar')->end()
            ->end();

//
//        $rootNode
//            ->children()
//                ->scalarNode('dir_name')->defaultValue('%kernel.root_dir%/DoctrineMigrations')->cannotBeEmpty()->end()
//                ->scalarNode('namespace')->defaultValue('Application\Migrations')->cannotBeEmpty()->end()
//                ->scalarNode('table_name')->defaultValue('migration_versions')->cannotBeEmpty()->end()
//                ->scalarNode('name')->defaultValue('Application Migrations')->end()
//                ->scalarNode('custom_template')->defaultValue(null)->end()
//                ->scalarNode('organize_migrations')->defaultValue(false)
//                    ->info('Organize migrations mode. Possible values are: "BY_YEAR", "BY_YEAR_AND_MONTH", false')
//                    ->validate()
//                        ->ifTrue(function ($v) use ($organizeMigrationModes) {
//                            if (false === $v) {
//                                return false;
//                            }
//
//                            if (is_string($v) && in_array(strtoupper($v), $organizeMigrationModes)) {
//                                return false;
//                            }
//
//                            return true;
//                        })
//                        ->thenInvalid('Invalid organize migrations mode value %s')
//                    ->end()
//                    ->validate()
//                        ->ifString()
//                            ->then(function ($v) {
//                                return constant('Doctrine\DBAL\Migrations\Configuration\Configuration::VERSIONS_ORGANIZATION_'.strtoupper($v));
//                            })
//                        ->end()
//                    ->end()
//            ->end()
//        ;
        return $treeBuilder;
    }
}
