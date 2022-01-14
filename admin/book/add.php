<?php
    include "../../connection.php";
    session_start();
    
    $number = $_POST['inputBookNumber'];
    $title = $_POST['inputBookTitle'];
    $category = $_POST['inputBookCategory'];
    $author = $_POST['inputBookAuthor'];
    $publisher = $_POST['inputBookPublisher'];
    $year = $_POST['inputBookYear'];
    $bookshelf_number = $_POST['inputBookshelf'];
    $stock_quantity = $_POST['inputBookQuantity'];

    // Insert user data into table 
    $sql= "INSERT INTO books(number, title, category_id, publisher_id, author_id, publication_year, bookshelf_number, stock_quantity) 
    VALUES('$number','$title', '$category','$author','$publisher', '$year', '$bookshelf_number', '$stock_quantity')";
    $query = mysqli_query($connection, $sql);
    mysqli_close($connection);
    header('location: index.php');
?>