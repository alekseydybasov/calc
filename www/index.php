<?php
spl_autoload_register(function (string $className) {
    require_once __DIR__ . "/../src/" . $className . ".php";
});

$route = $_GET['route'] ?? '';                              // GET запрос
$routes = require __DIR__ . "/../src/routes.php";           // подключаем файл с роутами
//var_dump($routes);
$isRouteFound = false;                                      // для дальнейшего вывода ошибки не найденой страницы
foreach ($routes as $pattern => $actionAndController){      // получаем имена контроллеров и экшенов в $actionAndController
    preg_match($pattern, $route, $matches);             // получаем совпадения по регулярке с GET запросом
    if (!empty($matches)){
        $isRouteFound = true;
        break;
    }
}
if (!$isRouteFound){                                        // вывод ошибки если страница не найдена
    echo 'Страница не найдена';
    return;
}
//var_dump($actionAndController);
//var_dump($matches);
unset($matches[0]);                                         // удаляем элесент массива 0 для использования оператора '...'
$controllerName = $actionAndController[0];                  // получаем имя контроллера из массива $actionAndController
$actionName = $actionAndController[1];                      // получаем имя экшена из массива $actionAndController

$controller = new $controllerName();                        // создаем объект класса $controllerName()
$controller-> $actionName(...$matches);                     // передаем элементы массива $matches по порядку в $cationName()


