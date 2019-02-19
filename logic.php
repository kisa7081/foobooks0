<?php

session_start();

if(isset($_SESSION['results'])){

    $books = $_SESSION['results']['books'];
    $searchTerm = $_SESSION['results']['searchTerm'];
    $bookCount = $_SESSION['results']['bookCount'];
    $caseSensitive = $_SESSION['results']['caseSensitive'];
}

session_unset();