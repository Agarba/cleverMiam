<?php

require __DIR__ . '/vendor/autoload.php';

$fileContent = file_get_contents(__DIR__ . '/data.yml');

$restos = \Symfony\Component\Yaml\Yaml::parse($fileContent);
$restos = $restos['restos'];

$resto = $restos[rand(0, count($restos) - 1)];

require __DIR__ . '/tpl.php';


