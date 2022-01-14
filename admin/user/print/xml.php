<?php
    include "../../../connection.php";
    header('Content-Type: text/xml');
    $sql = 'SELECT * FROM users;';
    $query = mysqli_query($connection, $sql);
    $field= mysqli_num_fields($query);
    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($query))
    {
        echo "<user>";
        echo"<id>",$data['id'],"</id>";
        echo"<email>",$data['email'],"</email>";
        echo"<fullname>",$data['full_name'],"</fullname>";
        echo"<password>",$data['password'],"</password>";
        echo "</user>";
    }
    echo "</data>";
?>