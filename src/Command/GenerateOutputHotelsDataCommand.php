<?php

namespace App\Command;

use App\Generator\CsvDataGenerator;
use App\Parser\CsvFileParser;
use App\Transformer\CsvDataTransformer;
use App\Transformer\Filter\FilterCriteria;
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
    const OUTPUT_DIR = __DIR__ . '/../../output/';
    const OUTPUT_FILE = 'hotels';

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
            )->addOption(
                'sort-field',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sorting field'
            )->addOption(
                'sort-order',
                null,
                InputOption::VALUE_OPTIONAL,
                'Sorting Order',
                'asc'
            )->addOption(
                'format',
                null,
                InputOption::VALUE_OPTIONAL,
                'Output format',
                'csv'
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
        $transformer = new CsvDataTransformer($data);

        if ($name = $input->getOption('name')) {
            $transformer->filterData((new FilterCriteria('name', $name)));
        }
        if ($url = $input->getOption('url')) {
            $transformer->filterData((new FilterCriteria('url', $url)));
        }
        if ($stars = $input->getOption('stars')) {
            $transformer->filterData((new FilterCriteria('stars', $stars)));
        }
        if ($sortField = $input->getOption('sort-field')) {
            $order = $input->getOption('sort-order');
            $transformer->sortData($sortField, $order);
        }

        $format = $input->getOption('format');
        switch ($format) {
            case 'csv' :
                $generator = new CsvDataGenerator(
                    $transformer->getData(),
                    static::OUTPUT_DIR,
                    static::OUTPUT_FILE
                );
                $generator->generate();
                break;
            default:
                break;
        }
        return 1;
    }
}