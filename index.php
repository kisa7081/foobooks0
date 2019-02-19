<?php
require 'helpers.php';
require 'logic.php';
?>

<!DOCTYPE html>
<html lang='en'>
<head>

    <title>Foobooks0</title>
    <meta charset='utf-8'/>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.0/css/bootstrap.min.css"
          rel="stylesheet"
          integrity="sha384-PDle/QlgIONtM1aqA2Qemk5gPOE7wFq8+Em+G/hmo5Iq0CCmYZLv3fVRDJ4MMwEA"
          crossorigin="anonymous">

    <link href='/styles/app.css' rel='stylesheet'>
</head>

<body>

    <h1>Fookbooks0</h1>

    <p>Small library and stuff. Do your thing</p>

    <form method='GET' action='search.php'>
        <label>Seacrh for a book by title
            <input type='text' name='searchTerm' value='<?php if (isset($searchTerm)) echo $searchTerm ?>'/>
        </label>
        <label>
            <input type='checkbox' name='caseSensitive' <?php if (isset($caseSensitive) and $caseSensitive) echo 'checked' ?>>Case sensitive
        </label>
        <input type='submit' value='Search'>
    </form>

    <?php if (isset($searchTerm)): ?>
        <div class='alert alert-primary' role='alert'>
            You searched for <em><?= $searchTerm ?></em>
        </div>
    <?php endif ?>

    <?php if (isset($bookCount) and $bookCount == 0): ?>
        <div class='alert alert-warning' role='alert'>
            You found nada.
        </div>
    <?php endif ?>

    <?php if (isset($books)): ?>
        <ul class='books'>
            <?php foreach ($books as $title => $book): ?>
                <li class='book'>
                    <div class='title'><?= $title ?></div>
                    <div class='author'>
                        by <?= $book['author'] ?>
                    </div>
                    <img src='<?= $book['cover_url'] ?>' alt='Cover photo for the book <?= $title ?>'>
                </li>
            <?php endforeach ?>
        </ul>
    <?php endif ?>


</body>

</html>