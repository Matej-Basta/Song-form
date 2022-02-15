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

    <form action="store.php" method="post">

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