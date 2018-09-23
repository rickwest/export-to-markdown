<?php

namespace RickWest\ExportToMarkdown\Command;


use RickWest\ExportToMarkdown\ExportToMarkdown;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateCommand extends Command
{
    protected function configure()
    {
        // the name of the command
        $this->setName('import')

            ->addOption('wpfile', 'w', InputOption::VALUE_REQUIRED, 'The XML file exported from Wordpress.')

            ->addOption('output', 'o', InputOption::VALUE_REQUIRED, 'The output path of the markdown files.')

            // the short description
            ->setDescription('')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp('')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $exportToMarkdown = new ExportToMarkdown();
        $result = false;

        if ($input->getOption('wpfile')) {
            var_dump($input->getOption('wpfile'));
            $file = @file_get_contents($input->getOption('wpfile'));

            if ($file === false) {
                return $output->writeln('<error>No such file. Please check that you have the correct spelling and file path.</error>');
            }

            if (empty($file)) {
                return $output->writeln('<error>Invalid file. The file cannot be empty.</error>');
            }

            $result = $exportToMarkdown->handleWordpressExport($file, $input->getOption('output'));
        }

        if ($result) {
            return $output->writeln('<info>Success! ' . $result . ' markdown files generated successfully.</info>');
        } else {
            return $output->writeln('<error>Error. There has been a problem handling your export.</error>');
        }
    }
}