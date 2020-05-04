<?php

use Phalcon\Loader;
use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\View;
use Phalcon\Url;
use Phalcon\Mvc\Application;



//fungsinya untuk meregristasikan direktori2 yang akan dipakai untuk project
define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');
// ...

$loader = new Loader();

$loader->registerDirs(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
  
);
$loader->registerNamespaces(array(
	
    /**
     * Load SQL server db adapter namespace
     */
    'Phalcon\Db\Adapter\Pdo' => APP_PATH . '/lib/Phalcon/Db/Adapter/Pdo',
    'Phalcon\Db\Dialect' => APP_PATH . '/lib/Phalcon/Db/Dialect',
    'Phalcon\Db\Result' => APP_PATH . '/lib/Phalcon/Db/Result',

)); //supaya phalcon tau dimana dia harus nyari class sqlsrvnya

$loader->register();
// Create a DI
//factory default merupakan salah satu bagian dari dependecy injection
//ini akan membuat semua kmponen yang diperlukan dalam project secara otomatis akan
//ditambahkan sesuai dengan standar Phalcon
$container = new FactoryDefault();
//a. kita perlu melakukan register pada view service
//setting direktori pada path view (terletak didalam folder app). karna view bukan berupa class, maka tidak bisa di load menggunakan autoloader.
$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');

        return $view;
    }
);
//ini untuk routing
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');

        return $url;
    }
);

$container['db'] = function () {

    $dbAdapter = "Phalcon\Db\Adapter\Pdo\Sqlsrv"; //class sqlsrv, biar bisa konek db

    return new $dbAdapter([
        "host" => "localhost",
        "username" => "SA",
        "password" => "bintangganteng",
        "dbname" => "belajar1"
    ]);
};

$application = new Application($container);

try {
    // Handle the request
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );

    $response->send();
} catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}

