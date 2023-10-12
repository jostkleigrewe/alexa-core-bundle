<?php

namespace Jostkleigrewe\AlexaCoreBundle\Command;

use Jostkleigrewe\AlexaCoreBundle\Intent\IntentCollection;
use Jostkleigrewe\AlexaCoreBundle\Manager\AlexaCoreManager;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Class DebugIntentsCommand
 *
 * @package   Jostkleigrewe\AlexaCoreBundle\Command
 * @author    Sven Jostkleigrewe <sven@jostkleigrewe.com>
 * @copyright 2021 Sven Jostkleigrewe
 */
class DebugIntentsCommand extends Command
{
    protected static $defaultName = 'alexa:debug:intents';

    /**
     * @var AlexaCoreManager $alexaCoreManager
     */
    private $alexaCoreManager;

    /**
     * DebugIntentsCommand constructor.
     * @param AlexaCoreManager $alexaCoreManager
     */
    public function __construct(AlexaCoreManager $alexaCoreManager)
    {
        $this->alexaCoreManager = $alexaCoreManager;

        parent::__construct();
    }

    /**
     * configure
     */
    protected function configure()
    {
        $this
            ->setDescription('Show all intent-services that are registered')
        ;
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return int
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        foreach ($this->alexaCoreManager->getIntentService()->getIntentCollection()->yieldHandlers() as $handler) {
            $io->comment('- ' . get_class($handler));

        }

        return Command::SUCCESS;
    }
}
