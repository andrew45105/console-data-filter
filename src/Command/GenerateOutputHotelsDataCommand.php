<?php

namespace App\Command;

use App\Parser\CsvFileParser;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class GenerateOutputHotelsDataCommand
 * @package App\Command
 */
class GenerateOutputHotelsDataCommand extends Command
{
    const FILE_PATH = __DIR__ . '/../../input/data.csv';

    /**
     * Command configuration
     */
    protected function configure()
    {
        $this
            ->setName('generate:data')
            ->setDescription('Generate output data from input data')
            ->addOption(
                'name',
                null,
                InputOption::VALUE_OPTIONAL,
                'Hotel name'
            )->addOption(
                'url',
                null,
                InputOption::VALUE_OPTIONAL,
                'Hotel URL'
            )->addOption(
                'stars',
                null,
                InputOption::VALUE_OPTIONAL,
                'Hotel stars'
            );
    }

    /**
     * @param InputInterface $input
     * @param OutputInterface $output
     * @return null|int
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $parser = new CsvFileParser(static::FILE_PATH);
        $data = $parser->parseData();
        var_dump($data);
        return 1;
    }
}