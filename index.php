<?php

require_once "DBBlackbox.php";
require_once "Song.php";


//index of all songs in our database

$songs = select(null, null, "Song");

$genres = [
    "country" => "Country",
    "pop" => "Pop",
    "rock" => "Rock",
    "metal" => "Metal"
];

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
    
        <div class="songs-list">
            <?php foreach($songs as $song) : ?>
                <div class="songs-list__song song-item">
                    <div class="song-item__title">
                    <a href="edit.php?id=<?= $song->id ?>">
                        <?= $song->title ?>
                    </a>
                        
                    </div>

                    <div class="song-item__genre">
                        <?= $genres[$song->genre] ?>
                    </div>

                    <div class="song-item__author">
                        by <?= $song->author_name ?>
                    </div>

                    <form action="delete.php?id=<?= $song->id ?>" method="post">
                        <button onclick="if (!confirm('Do you really want to delete this')) return false;">Delete</button>
                    </form>

                </div>
            <?php endforeach ; ?> 
        </div>

</body>
</html>