<?php
    include "../../../connection.php";
    header('Content-Type: text/xml');
    $sql = 'SELECT books.id, books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
    books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
    LEFT JOIN categories ON books.category_id = categories.id 
    LEFT JOIN publishers ON books.publisher_id = publishers.id
    LEFT JOIN authors ON books.author_id = authors.id;';
    $query = mysqli_query($connection, $sql);
    $field= mysqli_num_fields($query);
    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($query))
    {
        echo "<book>";
        echo"<id>",$data['id'],"</id>";
        echo"<number>",$data['number'],"</number>";
        echo"<title>",$data['title'],"</title>";
        echo"<category>",$data['category'],"</category>";
        echo"<author>",$data['author'],"</author>";
        echo"<publisher>",$data['publisher'],"</publisher>";
        echo"<year>",$data['year'],"</year>";
        echo"<bookshelf>",$data['bookshelf_number'],"</bookshelf>";
        echo"<quantity>",$data['stock_quantity'],"</quantity>";
        echo "</book>";
    }
    echo "</data>";
?>