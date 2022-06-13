<?php

$filename = 'data.json';

header('Content-Type: application/json');

$json = file_get_contents($filename);

$arrayMovies = json_decode($json, true);

$name = $_POST['name'];
$genre = $_POST['genre'];
$year = $_POST['year'];
$avrVote = $_POST['avrVote'];

class Movie {
    public $title;
    public $genre;
    public $year;
    public $avrVote;

    function __construct($_title, $_genre, $_year, $_avrVote) {
        $this->title = $_title;
        $this->genre = $_genre;
        $this->year = $_year;
        $this->avrVote = $_avrVote;
    }

}

$arrayMovies[] = new Movie($name, $genre, $year, $avrVote);

$json = json_encode($arrayMovies, JSON_PRETTY_PRINT);

file_put_contents($filename, $json);

echo $json;