<?php

namespace App\Parser;

/**
 * Class CsvFileParser
 * @package App\Parser
 */
class CsvFileParser extends FileParser
{
    /**
     * @return array
     * @throws \RuntimeException
     */
    public function parseData(): array
    {
        $result = [];
        $keys = [];
        $row = 0;
        if (($handle = @fopen($this->filePath, "r")) !== false) {
            while (($columns = fgetcsv($handle, 1000, ",")) !== false) {
                if ($row) {
                    if (count($columns) !== count($keys)) {
                        throw new \RuntimeException("Incorrect csv data file");
                    }
                    for ($i = 0; $i < count($columns); $i++) {
                        $result[$row][$keys[$i]] = $columns[$i];
                    }
                } else {
                    foreach ($columns as $column) {
                        if (!is_string($column)) {
                            throw new \RuntimeException(
                                'Name of column must be a string, ' .gettype($column) . ' given'
                            );
                        }
                    }
                    $keys = $columns;
                }
                $row++;
            }
            fclose($handle);
        } else {
            throw new \RuntimeException("Error while reading csv data file");
        }
        return $result;
    }
}