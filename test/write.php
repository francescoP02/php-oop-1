<?php

$filename = 'data.json';

header('Content-Type: application/json');

$json = file_get_contents($filename);

$array = json_decode($json, true);

$name = $_POST['name'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$vote = $_POST['vote'];

class Movie {
    public $title;
    public $genre;
    public $year;
    public $vote;

    function __construct($_title, $_genre, $_year, $_vote) {
        $this->title = $_title;
        $this->genre = $_genre;
        $this->year = $_year;
        $this->vote = $_vote;
    }

}

$array[] = new Movie($name, $genre, $year, $vote);

$json = json_encode($array, JSON_PRETTY_PRINT);

file_put_contents($filename, $json);

echo $json;