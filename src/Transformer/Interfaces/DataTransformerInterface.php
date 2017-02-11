<?php

namespace App\Transformer\Interfaces;

use App\Transformer\Filter\FilterCriteria;

/**
 * Interface DataTransformerInterface
 * @package App\Transformer\Interfaces
 */
interface DataTransformerInterface
{
    /**
     * @param FilterCriteria $criteria
     * @return array
     */
    public function filterData(FilterCriteria $criteria) : array ;

    /**
     * @param string $param
     * @return array
     */
    public function sortData(string $param) : array ;
}