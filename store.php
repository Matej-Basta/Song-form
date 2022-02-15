<?php

//handle the submission of create.php form
//store a new song into the database

require_once "Song.php";
require_once "DBBlackbox.php";

//prepare empty data

$song = new Song;

//fill the data from the request

$song->title = $_POST["title"] ?? $song->title;
$song->author_name = $_POST["author_name"] ?? $song->author_name;
$song->genre = $_POST["genre"] ?? $song->genre;


var_dump($song);

//save the data

$id = insert($song);

//redirect

header("Location: edit.php?id={$id}");