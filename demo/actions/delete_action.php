<?php
    require_once "../mysql.php";

    $id = $_POST['id'];
    

    $query = $mysql->query("DELETE FROM todos WHERE id=$id");
    header("Location:../index.php");
?>