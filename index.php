<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~ E_NOTICE);


class Movie {
    public $title;
    public $genre;
    public $year;
    public $votes = [];

    function __construct($_title, $_genre, $_year) {
        $this->title = $_title;
        $this->genre = $_genre;
        $this->year = $_year;
    }

    public function insertVote($_vote) {
        $this->votes[] = $_vote;
    }

    public function calcAverageVote() {
        $sum = 0;
        foreach ($this->votes as $vote) {
            $sum += $vote;
        }

        $avgvote = ($sum / count($this->votes));
        return $avgvote;
    }
}

$catalogue = [];
    
$harrypotter1 = new Movie("Harry Potter e la pietra filosofale", "Fantasy", "2001");
$harrypotter1->insertVote(9);
$harrypotter1->insertVote(10);
$harrypotter1->insertVote(8);
$harrypotter1->insertVote(10);

$harrypotter2 = new Movie("Harry Potter e la camera dei segreti", "Fantasy", "2002");
$harrypotter2->insertVote(10);
$harrypotter2->insertVote(8);
$harrypotter2->insertVote(10);
$harrypotter2->insertVote(9);

$harrypotter3 = new Movie("Harry Potter e il prigioniero di Azkaban", "Fantasy", "2004");
$harrypotter3->insertVote(9);
$harrypotter3->insertVote(10);
$harrypotter3->insertVote(10);

$harrypotter4 = new Movie("Harry Potter e l'ordine della fenice'", "Fantasy", "2005");
$harrypotter4->insertVote(9);
$harrypotter4->insertVote(10);
$harrypotter4->insertVote(8);
$harrypotter4->insertVote(10);
$harrypotter4->insertVote(8);

$catalogue[] = $harrypotter1;
$catalogue[] = $harrypotter2;
$catalogue[] = $harrypotter3;
$catalogue[] = $harrypotter4;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP OOP</title>
</head>
<body>

<ul>

  <?php foreach ($catalogue as $movie) { ?>

    <li>

      <h2><?php echo $movie->title; ?></h2>
      <h3>Genere: <?php echo $movie->genre; ?></h3>
      <h4>Uscito nell'anno: <?php echo $movie->year; ?></h4>
      <h5>Valutazione: <?php echo $movie-> calcAverageVote(); ?></h5>
    </li>

  <?php } ?>

</ul>

</body>
</html>