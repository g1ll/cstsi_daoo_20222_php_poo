<?php

use classes\Atleta;

spl_autoload_register(function ($class_name) {
    echo "\nnamespace: $class_name";
    $path = implode('/',explode('\\',$class_name)).".php";
    // $path = dirname(__FILE__)."/../$class_name.php";
    // $path = realpath( $path);
    echo "\npath: $path\n";
    require_once $path;

});

$jogador = new Atleta("Walter Kannemann",1.83,80);

//$jogador->calcImc();
$jogador->calc();
$jogador->showIMC();