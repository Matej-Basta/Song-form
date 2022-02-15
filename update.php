<?php

//handle the submission of edit.php form
//update an existing song in the database

require_once "Song.php";
require_once "DBBlackbox.php";
require_once "Session.php";

//prepare existing data
$id = $_GET["id"];

//validate the incoming data
$valid = true;
$errors = [];

if (empty($_POST["title"])) {
    //if title is empty
    $valid = false;
    $errors[] = "The title cannot be left empty.";
}

if (empty($_POST["genre"])) {
    
    $valid = false;
    $errors[] = "Please choose on of the genres.";
}

if (empty($_POST["author_name"])) {
    
    $valid = false;
    $errors[] = "The author cannot be left empty.";
}

if (!$valid) {
    //inform the user
    Session::instance()->flash("errors", $errors);

    //make it so the form displays with the wrong data
    
    //don't proceed
    header("Location: edit.php?id=" . $id);
    exit();
}

//prepare existing data
$id = $_GET["id"];

$song = find($id, "Song");

//fill it from request

$song->title = $_POST["title"] ?? $song->title;
$song->author_name = $_POST["author_name"] ?? $song->author_name;
$song->genre = $_POST["genre"] ?? $song->genre;


//save the data

update($song->id, $song);

//inform the user of a success
$session = Session::instance();
$session->flash("success_message", "Song successfully saved.");

//redirect

header("Location: edit.php?id={$song->id}");