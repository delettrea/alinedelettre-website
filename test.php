<?php

require 'vendor/autoload.php';

$index = new App\Controller\Controller();
$loader = new Twig_Loader_Filesystem(__DIR__.'/Vue');
$render = new Twig_Environment($loader, array(
    'cache' => false, //__DIR__.'/tmp'
));


$test = new \App\Controller\Controller();

$test->testFilter($render);

