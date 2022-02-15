<?php

//displaying a form to create a new Song


require_once "Song.php";

//prepare empty data
$song = new Song;

$genres = [
    "country" => "Country",
    "pop" => "Pop",
    "rock" => "Rock",
    "metal" => "Metal"
];


include "html.php";