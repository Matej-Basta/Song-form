<?php

//handle the submission of edit.php form
//update an existing song in the database

require_once "Song.php";
require_once "DBBlackbox.php";

//prepare existing data
$id = $_GET["id"];

$song = find($id, "Song");

//fill it from request

$song->title = $_POST["title"] ?? $song->title;
$song->author_name = $_POST["author_name"] ?? $song->author_name;
$song->genre = $_POST["genre"] ?? $song->genre;


//save the data

update($song->id, $song);

//redirect

header("Location: edit.php?id={$song->id}");