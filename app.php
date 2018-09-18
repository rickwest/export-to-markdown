#!/usr/bin/env php

<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use RickWest\WordpressToMarkdown\GenerateMarkdownCommand;

$app = new Application();

$app->add(new GenerateMarkdownCommand());

$app->run();