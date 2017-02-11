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
    protected $data;

    /**
     * DataGenerator constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return void
     */
    abstract public function generate(): void;
}