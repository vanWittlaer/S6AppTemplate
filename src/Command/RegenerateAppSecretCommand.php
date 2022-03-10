<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'regenerate-app-secret',
    description: 'create a new 16 byte app secret - copy & paste to your .env file',
)]
class RegenerateAppSecretCommand extends Command
{
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->success('New APP_SECRET was generated: ' . bin2hex(random_bytes(16)));

        return Command::SUCCESS;
    }
}
