<?php
    require_once './connection.php';

    $text = $_POST['text'];
    $author = $_POST['author'];
    $date = date("l jS \of F Y h:i:s A");

    $result = $collection->insertOne( [ 'text' => $text, 'author' => $author, 'date' => $date ] );
    header("Location:../syt.php");

?>