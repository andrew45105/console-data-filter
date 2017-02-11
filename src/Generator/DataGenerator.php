<?php

namespace App\Generator;

use App\Generator\Interfaces\DataGeneratorInterface;

/**
 * Class DataGenerator
 * @package App\Generator
 */
abstract class DataGenerator implements DataGeneratorInterface
{
    /**
     * @var array
     */
    private $data;

    /**
     * DataGenerator constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    abstract public function generate(): mixed;
}