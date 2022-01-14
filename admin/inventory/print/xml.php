<?php
    include "../../../connection.php";
    header('Content-Type: text/xml');
    $sql = 'SELECT items.id, items.name, item_categories.name AS category, items.good, items.bad, 
    (good+bad) AS quantity FROM items LEFT JOIN item_categories 
    ON items.itemcategory_id = item_categories.id;';
    $query = mysqli_query($connection, $sql);
    $field= mysqli_num_fields($query);
    echo "<?xml version='1.0'?>";
    echo "<data>";
    while ($data = mysqli_fetch_array($query))
    {
        echo "<inventory>";
        echo"<id>",$data['id'],"</id>";
        echo"<item>",$data['name'],"</item>";
        echo"<category>",$data['category'],"</category>";
        echo"<good>",$data['good'],"</good>";
        echo"<bad>",$data['bad'],"</bad>";
        echo"<quantity>",$data['quantity'],"</quantity>";
        echo "</inventory>";
    }
    echo "</data>";
?>