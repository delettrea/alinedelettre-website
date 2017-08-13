<?php
include("Vue/header.php");


require 'Autoloader.php';
Autoloader::register();
$index = new Controller();

$index->website();

include("Vue/footer.php");

