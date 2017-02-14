<?php

namespace App\Generator\Interfaces;

/**
 * Interface DataGeneratorInterface
 * @package App\Generator\Interfaces;
 */
interface DataGeneratorInterface
{
    /**
     * @return string
     */
    public function generate() : string;
}