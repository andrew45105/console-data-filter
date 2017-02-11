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
     * @return void
     */
    public function filterData(FilterCriteria $criteria) : void ;

    /**
     * @param string $param
     * @param string $order
     * @return void
     */
    public function sortData(string $param, string $order) : void ;
}