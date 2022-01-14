<?php
    include "../../../connection.php";
    $sql = 'SELECT books.id, books.number, books.title, categories.name AS category, authors.full_name AS author, publishers.full_name AS publisher,
    books.publication_year AS year, books.bookshelf_number, books.stock_quantity FROM books
    LEFT JOIN categories ON books.category_id = categories.id 
    LEFT JOIN publishers ON books.publisher_id = publishers.id
    LEFT JOIN authors ON books.author_id = authors.id ORDER BY books.number;';
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {
    $no=1;
    $response = array();
    $response["data"] = array();
    while ($row = mysqli_fetch_array($query)) {
    $data['id'] = $row['id'];
    $data['number'] = $row['number'];
    $data['title'] = $row['title'];
    $data['category'] = $row['category'];
    $data['author'] = $row['author'];
    $data['publisher'] = $row['publisher'];
    $data['year'] = $row['year'];
    $data['bookshelf_number'] = $row['bookshelf_number'];
    $data['stock_quantity'] = $row['stock_quantity'];

    array_push($response["data"], $data);
    }
    echo json_encode($response);
    }
    else {
    $response["message"]="tidak ada data";
    echo json_encode($response);
    }
?>