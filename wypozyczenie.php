<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <link rel="stylesheet" href="style1.css?version=51" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="header">
    <a href="panel.php" id="none"><h1>FlixGo</h1></a>
    </div>
    
<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: panel.php');
		exit();
	}
	$usr=$_SESSION['user'];
    if($_GET['film'])
    {
         $film=$_GET['film'];
    require_once "connect.php";
        echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno())
    {
        echo "Wystąpił błąd połączenia z bazą";
    }
        else
        {
        $test = mysqli_query($polaczenie,"SELECT test FROM wypozyczenia WHERE (user='$usr' AND id_filmu='$film')");
            $row = mysqli_fetch_array($test);
            if($row)
            {
                echo "<div id='baner_inf'>";      
        echo "Film już wypożyczono<br><br><button id='zaloguj_sie'>";
        echo "<a id='none' href="."stronafilmu.php?film=".$film.">Powróc do strony filmu</a></button><br></div>";
            }
            else
            {
        $wynik = mysqli_query($polaczenie,"INSERT INTO wypozyczenia (id, user, id_filmu, test)VALUES (NULL, '$usr', '$film', 1)");
            
          echo "<div id='baner_inf'>";      
        echo "Pomyślnie wypożyczono film!<br><br><button id='zaloguj_sie'>";
        echo "<a id='none' href="."stronafilmu.php?film=".$film.">Powróc do strony filmu</a></button><br></div>";
            }
        }
    }
else
{
    header('Location: panel.php');
		exit();
}
   
    mysqli_close($polaczenie);
?>


	
	
	

</body>
</html>