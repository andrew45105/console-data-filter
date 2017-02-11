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
     * @param FilterCriteria $criteria
     * @return array
     */
    abstract public function filterData(FilterCriteria $criteria): array;

    /**
     * @param string $param
     * @return array
     */
    abstract public function sortData(string $param): array;
}