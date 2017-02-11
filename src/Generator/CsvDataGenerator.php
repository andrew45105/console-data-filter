<?php

namespace App\Generator;

/**
 * Class CsvDataGenerator
 * @package App\Generator
 */
class CsvDataGenerator extends DataGenerator
{
    /**
     * @var string
     */
    private $outputDir;

    /**
     * @var string;
     */
    private $outputFile;

    /**
     * CsvDataGenerator constructor.
     * @param array $data
     * @param string $outputDir
     * @param string $outputFile
     */
    public function __construct(array $data, string $outputDir, string $outputFile)
    {
        $this->outputDir = $outputDir;
        $this->outputFile = $outputFile;
        parent::__construct($data);
    }

    /**
     * @return void
     */
    public function generate(): void
    {
        $list = [array_keys($this->data[0])];
        foreach ($this->data as $elem) {
            $list[] = array_values($elem);
        }

        $fp = fopen($this->outputDir . $this->outputFile . '_' . md5(time()) . '.csv', 'w');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);
    }
}