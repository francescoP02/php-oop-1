<?php

$filename = 'data.json';

$arrayMovies = [];

$json = json_encode($arrayMovies);

file_put_contents($filename, $json);

?>