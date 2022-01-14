<?php
    include "../../../connection.php";
    $sql = 'SELECT items.id, items.name, item_categories.name AS category, items.good, items.bad, 
    (good+bad) AS quantity FROM items LEFT JOIN item_categories 
    ON items.itemcategory_id = item_categories.id;';
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {
        $no=1;
        $response = array();
        $response["data"] = array();
        while ($row = mysqli_fetch_array($query)) {
            $data['id'] = $row['id'];
            $data['item'] = $row['name'];
            $data['category'] = $row['category'];
            $data['good'] = $row['good'];
            $data['bad'] = $row['bad'];
            $data['quantity'] = $row['quantity'];
            array_push($response["data"], $data);
        }
        echo json_encode($response);
    }
    else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>