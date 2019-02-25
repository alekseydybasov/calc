<?php

namespace MyProject\Controllers;

use MyProject\Models\Lamp;
use MyProject\Models\Material;
use MyProject\View\View;

class MainController
{
    private $view;

    public function __construct()
    {
        $this->view = new View(__DIR__ . '/../../../Templates');
    }

    public function main()
    {
        $lamp = Lamp::findAll();
        $material = Material::findAll();
        $this->view->renderHtml('main/main.php', ['lamp' => $lamp, 'material' => $material]);
    }

    public function calc()
    {
        $resultPriceLamps = Lamp::calculatePriceLamp();
        $resultPriceMaterial = Material::calcultePriceMaterial();
        if (($resultPriceLamps == null) || ($resultPriceMaterial == null)) {
                $this->view->renderHtml('errors/invalidDate.php');
        } else {
            $this->view->renderHtml('result/result.php',
                ['resultPriceLamps' => $resultPriceLamps, 'resultPriceMaterial' => $resultPriceMaterial]
            );
        }


    }

}
