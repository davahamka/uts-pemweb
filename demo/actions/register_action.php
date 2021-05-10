<?php
    session_start();
    require_once "../mysql.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $name = $_POST['name'];

    $query = $mysql->query("SELECT * FROM users WHERE username='$username'");
    $result = $query->fetch_assoc();

	if ($query->num_rows == 1) {
        $_SESSION['flash_register'] = "Username sudah terdaftar";

        header("location:../register.php");

    } else {
        $query = $mysql->query("INSERT INTO `users` (`id`,`username`,`password`, `email`, `name`) VALUES (NULL, '$username', '$password', '$email', '$name');");
        header("Location:../account-created.php");
    }
?>