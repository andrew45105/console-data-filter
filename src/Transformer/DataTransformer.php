<?php

namespace App\Transformer;

use App\Transformer\Filter\FilterCriteria;
use App\Transformer\Interfaces\DataTransformerInterface;

/**
 * Class DataTransformer
 * @package App\Transformer
 */
abstract class DataTransformer implements DataTransformerInterface
{
    /**
     * @var array
     */
    protected $data;

    /**
     * DataTransformer constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

    /**
     * @param FilterCriteria $criteria
     * @return void
     */
    abstract public function filterData(FilterCriteria $criteria): void;

    /**
     * @param string $param
     * @param string $order
     * @return void
     */
    abstract public function sortData(string $param, string $order): void;
}