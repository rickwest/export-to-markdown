#!/usr/bin/env php

<?php

require __DIR__.'/vendor/autoload.php';

use Symfony\Component\Console\Application;
use RickWest\ExportToMarkdown\Command\GenerateCommand;

$app = new Application();

$app->add(new GenerateCommand());

$app->run();