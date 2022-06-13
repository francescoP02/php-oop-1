<?php

$filename = 'data.json';

header('Content-Type: application/json');

$json = file_get_contents($filename);

echo $json;