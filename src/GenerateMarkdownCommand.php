<?php

namespace RickWest\WordpressToMarkdown;

use League\HTMLToMarkdown\HtmlConverter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GenerateMarkdownCommand extends Command
{
    protected function configure() {
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
        $filename = $input->getArgument('file');

        // if problem with finding file return a nice error;

        // load the xml file
        if (! $xml = simplexml_load_file($filename)) {
            // error message
            return;
        };

        // pick a random (but interesting!) item for now;

        foreach($xml->channel->item as $item) {
            // return object whether child exists or now
            $content = $item->children('content', true);

            // could check count, message and skip if no content, blank file is no good?
            if ($content->count() === 0) {
                // continue
            }

            $html = (string) $content->encoded[0];

            $converter = new HtmlConverter();

            $content = $converter->convert($html);
            // need to catch exception and continue;

            $data = <<<EOT
---
title: $item->title
data: $item->pubDate
test: $item->test
description: $item->description
---

$content

EOT;

            // file names could be the dates as jigsaw will automatically sort by date
            // but personally I'm not keep so will parse link;

            // parse link for filename;
            $url = parse_url($item->link);

            $name = preg_replace('/[^a-zA-Z-]/', '', $url['path']);

            // returns number of bytes of false on failure;
            file_put_contents($name . '.md', $data);
        }
    }
}