<?php

namespace App\Parser;

use App\Parser\Interfaces\ParsingInterface;

/**
 * Class FileParser
 * @package App\Parser
 */
abstract class FileParser implements ParsingInterface
{
    /**
     * @var string
     */
    protected $filePath;

    /**
     * FileParser constructor.
     * @param string $filePath
     */
    public function __construct(string $filePath)
    {
        if (file_exists($filePath)) {
            $this->filePath = $filePath;
        } else {
            throw new \RuntimeException("File {$filePath} does not exists");
        }
    }

    /**
     * @return array
     * @throws \RuntimeException
     */
    abstract public function parseData(): array;
}