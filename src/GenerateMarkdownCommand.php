<?php

namespace RickWest\WordpressToMarkdown;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateMarkdownCommand extends Command
{
    protected function configure() {
        // the name of the command
        $this->setName('import')

            // the short description
            ->setDescription('')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        //
    }
}