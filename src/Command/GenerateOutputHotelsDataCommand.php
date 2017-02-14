<?php

namespace App\Command;

use App\Generator\FileDataGenerator;
use App\Parser\CsvFileParser;
use App\Transformer\DataTransformer;
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
    const OUTPUT_FILE_PREFIX = 'hotels';

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
        $transformer = new DataTransformer($data);

        $criteria = new FilterCriteria();

        if ($name = $input->getOption('name')) {
            $criteria->setKey('name');
            $criteria->setEquals($name);
        }
        if ($url = $input->getOption('url')) {
            $criteria->setKey('url');
            $criteria->setEquals($url);
        }
        if ($stars = $input->getOption('stars')) {
            $criteria->setKey('stars');
            $criteria->setEquals($stars);
        }

        $transformer->filterData($criteria);

        if ($sortField = $input->getOption('sort-field')) {
            $order = $input->getOption('sort-order');
            $transformer->sortData($sortField, $order);
        }

        $format = $input->getOption('format');

        if (in_array($format, ['csv', 'xml', 'json'])) {
            $generatorClass = new \ReflectionClass('App\\Generator\\' . ucfirst($format) . 'FileDataGenerator');
            /* @var FileDataGenerator */
            $generatorInstance = $generatorClass->newInstanceArgs([
                $transformer->getData(),
                static::OUTPUT_DIR,
                static::OUTPUT_FILE_PREFIX,
            ]);
            $fileName = $generatorInstance->generate();
            $output->writeln("<info>File /output/$fileName was successfully generated</info>");
        } else {
            $output->writeln("<info>Format $format is not acceptable</info>");
        }

        return 1;
    }
}