<?php

	session_start();
	
    require_once "connect.php";
    $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
    if ($polaczenie->connect_errno!=0)
    {
        throw new Exception(mysqli_connect_errno());
    }
    else
	{
        $wybor = $_SESSION['user'];
        $wynik = mysqli_query($polaczenie,"DELETE FROM uzytkownicy where user='$wybor'");
    }
    $polaczenie->close();
	session_unset();
	
	header('Location: witamydelete.php');

?>