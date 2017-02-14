<?php

namespace App\Generator;

/**
 * Class CsvFileDataGenerator
 * @package App\Generator
 */
class CsvFileDataGenerator extends FileDataGenerator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $list = [array_keys($this->data[0])];
        foreach ($this->data as $elem) {
            $list[] = array_values($elem);
        }

        $fileName = $this->getFileName() . '.' . $this->getExtension();
        $filePath = $this->outputDir . $fileName;
        $fp = fopen($filePath, 'w');

        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }

        fclose($fp);

        return $fileName;
    }
}