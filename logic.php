<?php

$booksJson = file_get_contents('books.json');

json_decode($booksJson);

dump($booksJson);