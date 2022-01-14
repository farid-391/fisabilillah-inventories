<?php
    include "../../connection.php";
    session_start();

    $id = $_POST['editBookId'];
    $number = $_POST['editBookNumber'];
    $title = $_POST['editBookTitle'];
    $category = $_POST['editBookCategory'];
    $author = $_POST['editBookAuthor'];
    $publisher = $_POST['editBookPublisher'];
    $year = $_POST['editBookYear'];
    $bookshelf_number = $_POST['editBookshelf'];
    $stock_quantity = $_POST['editBookQuantity'];

    // Insert user data into table 
    $sql= "UPDATE books SET number = '$number', title = '$title', category_id = '$category', publisher_id = '$publisher', author_id = '$author', 
    publication_year = '$year', bookshelf_number = '$bookshelf_number', stock_quantity = '$stock_quantity' WHERE id = $id" ;

    $query = mysqli_query($connection, $sql);

    mysqli_close($connection);
    header('location: index.php');
?>