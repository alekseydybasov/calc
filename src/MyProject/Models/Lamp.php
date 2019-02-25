<?php

namespace MyProject\Models;

use MyProject\Services\Db;

class Lamp
{
    /** @var */
    private $lamp;
    /** @var */
    private $pricePerPoint;
    /** @var */
    private $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLamp(): string
    {
        return $this->lamp;
    }

    /**
     * @return float
     */
    public function getPricePerPoint(): float
    {
        return $this->pricePerPoint;
    }

    public function __set($name, $value)
    {
        $camelCaseName = $this->underscoreToCamaleCase($name);
        $this->$camelCaseName = $value;
    }

    public function underscoreToCamaleCase(string $source)
    {
        return lcfirst(str_replace('_', '', ucwords($source, '_')));
    }

    public function findAll()
    {
        $db = Db::getInstance();
        $lamps = $db->query('SELECT * FROM lamp;', [], static::class);
        return $lamps;
    }

    /**
     * @param float $id
     * @return array|mixed|null
     */
    public function calculatePriceLamp()
    {
        $lamp = $_POST['lamp'];
        $db = Db::getInstance();
        $pricePerPoint = $db->query('SELECT price_per_point FROM lamp WHERE lamp=:name;', [':name' => $lamp], static::class);

        foreach ($pricePerPoint as $item) {
            if ($item != null) {
                $result = $item->getPricePerPoint();
            }
        }
        return $result *= $_POST['countLamp'];
    }
}

