<?php

namespace App\Parser\Interfaces;

/**
 * Interface ParsingInterface
 * @package App\Parser\Interfaces
 */
interface ParsingInterface
{
    /**
     * @return array
     */
    public function parseData() : array;
}