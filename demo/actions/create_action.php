<?php
    require_once "../mysql.php";

    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $in_charge = $_POST['incharge'];

    // echo $in_charge;
    

    $query = $mysql->query("INSERT INTO `todos` (`id`, `title`, `description`, `date`, `in_charge`) VALUES (NULL, '$title', '$description', '$date', '$in_charge');");
    header("Location:../index.php");
?>