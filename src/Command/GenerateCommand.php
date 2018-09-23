<?php

namespace RickWest\ExportToMarkdown\Command;


use RickWest\ExportToMarkdown\ExportToMarkdown;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected function configure()
    {
        // the name of the command
        $this->setName('import')

            ->addArgument('file', InputArgument::REQUIRED, 'The XML file exported from Wordpress')

            // the short description
            ->setDescription('')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $input = @file_get_contents($input->getArgument('file'));

        if ($input === false) {
            return $output->writeln('<error>No such file. Please check that you have the correct spelling and file path.</error>');
        }

        if (empty($input)) {
            return $output->writeln('<error>Invalid file. The file cannot be empty.</error>');
        }

        $exportToMarkdown = new ExportToMarkdown();
        $result = $exportToMarkdown->handle($input);

        return $output->writeln('<info>Success! ' . $result . ' markdown files generated successfully.</info>');
    }
}