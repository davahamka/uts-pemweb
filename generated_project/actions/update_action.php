<?php
    require_once "../mysql.php";

    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = $_POST['date'];
    $in_charge = $_POST['in_charge'];

    echo $id;
    echo $title;
    echo $description;
    echo $date;
    echo $in_charge;

    if($date){
        $query = $mysql->query("UPDATE todos SET title='$title', `description`='$description', `date`='$date', `in_charge`='$in_charge' WHERE id=$id");
    } else {
        $query = $mysql->query("UPDATE todos SET title='$title', `description`='$description', `in_charge`='$in_charge' WHERE id=$id");
    }
    
    header("Location:../index.php");
?>