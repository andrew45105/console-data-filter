<?php

namespace App\Generator;

/**
 * Class JsonFileDataGenerator
 * @package App\Generator
 */
class JsonFileDataGenerator extends FileDataGenerator
{
    /**
     * @return string
     */
    public function generate(): string
    {
        $json = '[';
        foreach ($this->data as $elem) {
            $json .= json_encode($elem) . ',';
        }
        $json = substr($json, 0, -1) . ']';

        $fileName = $this->getFileName() . '.' . $this->getExtension();
        $filePath = $this->outputDir . $fileName;

        file_put_contents($filePath, $json);

        return $fileName;
    }
}