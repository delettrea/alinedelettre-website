<?php
include("Vue/header.php");

require 'vendor/autoload.php';

$index = new App\Controller\Controller();

$index->website();

include("Vue/footer.php");

