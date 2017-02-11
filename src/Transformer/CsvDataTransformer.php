<?php

namespace App\Transformer;

use App\Transformer\Filter\FilterCriteria;

/**
 * Class CsvDataTransformer
 * @package App\Transformer
 */
class CsvDataTransformer extends DataTransformer
{
    /**
     * @param FilterCriteria $criteria
     * @return array
     */
    public function filterData(FilterCriteria $criteria): array
    {
        $result = [];
        foreach ($this->data as $elem) {
            //...
        }

        return $result;
    }

    /**
     * @param string $param
     * @return array
     */
    public function sortData(string $param): array
    {
        return [];
    }
}