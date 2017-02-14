<?php

namespace App\Transformer\Filter;

/**
 * Class contains filters criteria
 * Class FilterCriteria
 * @package App\Transformer\Filter
 */
class FilterCriteria
{
    /**
     * Key for filtering data array
     * @var string
     */
    private $key;

    /**
     * @var string|int|float
     */
    private $equals;

    /**
     * @var array
     */
    private $between;

    /**
     * @var string
     */
    private $like;

    /**
     * @var int|float
     */
    private $up;

    /**
     * @var int|float
     */
    private $down;

    /**
     * FilterCriteria constructor.
     * @param string $key
     * @param null $equals
     */
    public function __construct(
        string $key = null,
        $equals = null
    )
    {
        $this->key = $key;
        if ($equals) {
            $this->setEquals($equals);
        }
    }

    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
     * @return float|int|string
     */
    public function getEquals()
    {
        return $this->equals;
    }

    /**
     * @return array
     */
    public function getBetween(): array
    {
        return $this->between;
    }

    /**
     * @return string
     */
    public function getLike(): string
    {
        return $this->like;
    }

    /**
     * @return float|int
     */
    public function getUp()
    {
        return $this->up;
    }

    /**
     * @return float|int
     */
    public function getDown()
    {
        return $this->down;
    }

    /**
     * @param string $key
     */
    public function setKey(string $key)
    {
        $this->validateParams();
        $this->key = $key;
    }

    /**
     * @param float|int|string $equals
     */
    public function setEquals($equals)
    {
        $this->validateParams();
        $this->equals = $equals;
    }

    /**
     * @param array $between
     */
    public function setBetween(array $between)
    {
        $this->validateParams();
        $this->between = $between;
    }

    /**
     * @param string $like
     */
    public function setLike(string $like)
    {
        $this->validateParams();
        $this->like = $like;
    }

    /**
     * @param float|int $up
     */
    public function setUp($up)
    {
        $this->validateParams();
        $this->up = $up;
    }

    /**
     * @param float|int $down
     */
    public function setDown($down)
    {
        $this->validateParams();
        $this->down = $down;
    }

    /**
     * @return void
     * @throws \RuntimeException
     */
    private function validateParams()
    {
        $errors = [];
        /*if (!is_string($equals) && !is_numeric($equals)) {
            ...
        }
        if (count($beetwen) != 2) {
            ...
        }*/
        if ($errors) {
            throw new \RuntimeException(
                'Errors: ' . implode(', ', $errors) . ' in ' . get_class()
            );
        }
    }
}