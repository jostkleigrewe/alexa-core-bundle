<?php

namespace Jostkleigrewe\AlexaCoreBundle\Command;

use Jostkleigrewe\AlexaCoreBundle\Service\AlexaIntentDispatcher;
use Override;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

/**
 * Command to debug and list all registered intent-services.
 */
#[AsCommand(name: 'alexa:debug:intents')]
class DebugIntentsCommand extends Command
{
    public function __construct(
        private readonly AlexaIntentDispatcher $alexaIntentDispatcher
    ) {
        parent::__construct();
    }

    #[Override]
    protected function configure(): void
    {
        $this
            ->setDescription('Show all intent-services that are registered')
            ->setHelp('This command allows you to list all intent-services that are registered.')
        ;
    }

    #[Override]
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('Registered Intent Services');
        foreach ($this->alexaIntentDispatcher->getIntentCollection()->yieldHandlers() as $handler) {
            $io->listing([$handler::class]);
        }
        $io->success('Listing completed successfully.');

        return Command::SUCCESS;
    }
}
