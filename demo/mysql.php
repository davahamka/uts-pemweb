<?php
$mysql = new mysqli('localhost','root','123','uts_pemweb');
	if ($mysql->connect_errno) {
		die("MySQL Error : ".$mysql->connect_error);
	}


?>