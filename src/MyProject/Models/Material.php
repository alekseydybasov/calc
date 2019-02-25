<?php

namespace MyProject\Models;

use MyProject\Services\Db;

class Material
{
    /** @var */
    private $material;
    /** @var */
    private $price;

    public function getMaterial()
    {
        return $this->material;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @return array|null
     */
    public function findAll()
    {
        $db = Db::getInstance();
        $material = $db->query('SELECT * FROM material;', [], static::class);
        return $material;
    }

    public function calcultePriceMaterial()
    {
        $squareRoom = $_POST['wRoom'] * $_POST['lRoom'];
        $material = $_POST['material'];
        $db = Db::getInstance();
        $priceMaterial = $db->query('SELECT price FROM material WHERE material=:name;', [':name' => $material], static::class);

        foreach ($priceMaterial as $item) {
            if ($item != null){
                $resultPriceMaterial = $item->getPrice();
            }
        }

        $squareRoomAndLevelsPrice = $squareRoom * $_POST['levels'];
        return $resultPriceMaterial *= $squareRoomAndLevelsPrice;
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
}
