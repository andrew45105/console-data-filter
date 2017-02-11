<?php

namespace App\Generator\Interfaces;

/**
 * Interface DataGeneratorInterface
 * @package App\Generator\Interfaces;
 */
interface DataGeneratorInterface
{
    /**
     * @return mixed
     */
    public function generate() : mixed;
}