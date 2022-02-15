<?php


//display a form to edit an existing song

require_once "DBBlackbox.php";
require_once "Song.php";
require_once "Session.php";


$session = Session::instance();
// var_dump($session);

//get id of the song to edit from the URL
$id = $_GET["id"];

//prepare data about an existing song
$song = find($id, "Song");

$genres = [
    "country" => "Country",
    "pop" => "Pop",
    "rock" => "Rock",
    "metal" => "Metal"
];




//display the from prefilled with the data about the existing song
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <?php if ($errors = Session::instance()->get("errors")) : ?>
<?php foreach ($errors as $error) : ?>
        <div class="error">
            <?= $error ?>
        </div>

        <?php endforeach; ?>

    <?php endif; ?>

    <?php if ($message = Session::instance()->get("success_message")) : ?>

        <div class="success">
            <?= $message ?>
        </div>

    <?php endif; ?>

    <form action="update.php?id=<?= $song->id ?>" method="post">

        <div class="form-group">
            <label for="title">Title</label>
            <input 
                type="text"
                name="title"
                value="<?= $song->title ?>"
            >
        </div>

        <div class="form-group">
            <label for="author_name">Author</label>
            <input 
                type="text"
                name="author_name"
                value="<?= $song->author_name ?>"
            >
        </div>

        <div class="form-group">
            <label for="genre">Genre</label>
            <select name="genre" id="">

                <?php if(empty($song->genre)) : ?>
                    <option value="choose">Choose One</option>
                <?php endif ; ?>

                <?php foreach($genres as $value => $name) : ?>
                    <option value="<?= $value ?>" <?= $song->genre === $value ? "selected" : "" ?>><?= $name ?></option>
                <?php endforeach ; ?>

            </select>
        </div>

        <button class="submit-button">Save</button>
    
    </form>
    
</body>
</html>
