<?php
include("Vue/header.php");

require 'vendor/autoload.php';

$index = new App\Controller\Controller();
$loader = new Twig_Loader_Filesystem(__DIR__.'/Vue');
$twig = new Twig_Environment($loader, array(
    'cache' => false, //__DIR__.'/tmp'
));

$index->website($twig);

include("Vue/footer.php");


