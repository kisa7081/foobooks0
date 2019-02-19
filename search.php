<?php

session_start();

require 'helpers.php';

#Get the search term
$searchTerm = $_GET['searchTerm'];

$caseSensitive = isset($_GET['caseSensitive']);

# Load the books
$booksJson = file_get_contents('books.json');

$books = json_decode($booksJson, true);

# Apply filter

foreach($books as $title => $book ){

    if($caseSensitive) {
        $noMatch = $title != $searchTerm;
    }
    else {
        $noMatch = strtolower($title) != strtolower($searchTerm);
    }
    if($noMatch){
        unset($books[$title]);
    }

}
dump($books);
$_SESSION['results'] = [
    'searchTerm' => $searchTerm,
    'books' => $books,
    'bookCount' => count($books),
    'caseSensitive' => $caseSensitive
];

header('Location: index.php');
//
//dump($searchTerm);
