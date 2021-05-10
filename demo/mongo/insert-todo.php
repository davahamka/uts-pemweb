<?php
    require_once './connection.php';

    $result = $collection->insertOne( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
    echo "Inserted with Object ID '{$result->getInsertedId()}'";

?>