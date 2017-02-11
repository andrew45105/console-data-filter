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
     * @return void
     */
    public function filterData(FilterCriteria $criteria): void
    {
        $result = [];
        foreach ($this->data as $elem) {
            if ($elem[$criteria->getKey()] === $criteria->getEquals()) {
                $result[] = $elem;
            }
        }
        $this->data = $result;
    }

    /**
     * @param string $param
     * @param string $order
     * @return void
     */
    public function sortData(string $param, string $order): void
    {
        uasort($this->data, function($a, $b) use ($param, $order) {
            if ($order == 'asc') {
                return $a[$param] <=> $b[$param];
            } else {
                return $b[$param] <=> $a[$param];
            }
        });
    }
}