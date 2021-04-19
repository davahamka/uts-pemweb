<?php
    require_once './mysql.php';

    session_start();
    $username = $_POST['username'];
    $password = md5($_POST['password']);

	$query = $mysql->query("SELECT * FROM users WHERE username='$username'");
    $result = $query->fetch_assoc();

	if ($query->num_rows == 1) {
		if ($password == $result['password']) {
			$_SESSION['username'] = $result['username'];
			$_SESSION['name'] = $result['name'];
            header("location:./index.php");
		} else {
            echo "Password salah";
        }
    } else {
        echo "Username belum terdaftar";
    }
	
?>