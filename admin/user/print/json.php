<?php
    include "../../../connection.php";
    $sql = 'SELECT * FROM users';
    $query = mysqli_query($connection, $sql);
    if (mysqli_num_rows($query) > 0) {
        $no=1;
        $response = array();
        $response["data"] = array();
        while ($row = mysqli_fetch_array($query)) {
            $data['id'] = $row['id'];
            $data['email'] = $row['email'];
            $data['fullname'] = $row['full_name'];
            $data['password'] = $row['password'];
            array_push($response["data"], $data);
        }
        echo json_encode($response);
    }
    else {
        $response["message"]="tidak ada data";
        echo json_encode($response);
    }
?>