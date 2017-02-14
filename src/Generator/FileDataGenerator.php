<?php

namespace App\Generator;

/**
 * Class FileDataGenerator
 * @package App\Generator
 */
abstract class FileDataGenerator extends DataGenerator
{
    /**
     * @var string
     */
    protected $outputDir;

    /**
     * @var string;
     */
    protected $outputFilePrefix;

    /**
     * FileDataGenerator constructor.
     * @param array $data
     * @param string $outputDir
     * @param string $outputFilePrefix
     */
    public function __construct(array $data, string $outputDir, string $outputFilePrefix)
    {
        $this->outputDir = $outputDir;
        $this->outputFilePrefix = $outputFilePrefix;
        parent::__construct($data);
    }

    /**
     * @return string
     */
    protected function getExtension()
    {
        $paths = explode('\\', get_called_class());
        $className = array_pop($paths);
        return lcfirst(substr($className, 0, -17));
    }

    /**
     * @return float
     */
    protected function getFileName()
    {
        return $this->outputFilePrefix . '_' . round(microtime(true) * 1000);
    }
}