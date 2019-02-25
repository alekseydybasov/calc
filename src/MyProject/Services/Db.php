<?php

namespace MyProject\Services;

class Db
{
    private $pdo;
    private static $instance; //свойство для реализации метода getInstance()

    private function __construct()
    {
        $dbOptions = (require __DIR__ . '/../../settings.php')['db'];
        $this->pdo = new \PDO(
            'mysql:host=' . $dbOptions['host'] . ';dbname=' . $dbOptions['dbname'],
            $dbOptions['user'],
            $dbOptions['password']
        );
        $this->pdo->exec('SET NAME UTF8');
    }

    public function query(string $sql, array $params = [], string $className = 'stdClass')
    {
        $sth = $this->pdo->prepare($sql);
        $result = $sth->execute($params);

        if ($result == false) {
            return null;
        }
        return $sth->fetchAll(\PDO::FETCH_CLASS, $className);
    }

    /**
     * @return Db
     */
    public static function getInstance(): self          //реализуем паттерн Синглтон(Singleton) -
    {                                                   //будет создано не более одного объекта класса Db
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }
}