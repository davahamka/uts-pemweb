<?php
    require_once '../mysql.php';

    session_start();
    $_SESSION['flash_login'] = "";
    $username = $_POST['username'];
    $password = md5($_POST['password']);


	$query = $mysql->query("SELECT * FROM users WHERE username='$username'");
    $result = $query->fetch_assoc();

	if ($query->num_rows == 1) {
		if ($password == $result['password']) {
			$_SESSION['username'] = $result['username'];
			$_SESSION['name'] = $result['name'];
            header("location:../index.php");
		} else {
            $_SESSION['flash_login'] = "Password salah";
            header("location:../login.php");
        }
    } else {
        echo $_SESSION['flash_login'] = "Username belum terdaftar";
        header("location:../login.php");
    }

	
?>