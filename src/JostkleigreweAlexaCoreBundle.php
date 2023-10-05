<?php
declare(strict_types = 1);

namespace Jostkleigrewe\AlexaCoreBundle;

use Jostkleigrewe\AlexaCoreBundle\DependencyInjection\Compiler\IntentPass;
use Jostkleigrewe\AlexaCoreBundle\Intent\IntentInterface;
use Jostkleigrewe\AlexaCoreBundle\Service\IntentService;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Class JostkleigreweAlexaCoreBundle
 *
 * @package   Jostkleigrewe\AlexaCoreBundle
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
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
     * This directory structure requires to configure the bundle path to its root directory
     *
     * @return string
     */
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}