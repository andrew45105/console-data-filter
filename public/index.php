<?php

require __DIR__.'/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use App\Command\GenerateOutputHotelsDataCommand;

$application = new Application();
$application->add(new GenerateOutputHotelsDataCommand());
$application->run();