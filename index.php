<?php

	session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: panel.php');
		exit();
	}

?>

<!DOCTYPE HTML>
<html>
<head>
    <title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>
<body>
    
    <div id="header">
        <a href="panel.php" id="none"><h1>FlixGo - Wypożycz już teraz!</h1></a>
    </div>
    
	<div id="page">
        <h3>Znajdziesz tutaj swoje ulubione filmy!</h3>
    </div>
    <!--Panel logowania do strony-->
    <div id="panel">
    <div id="p_log">
	<form action="zaloguj.php" method="post">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" align="center" id="zaloguj_sie"/><br><hr>
        <button id="zaloguj_sie">
	<a href="rejestracja.php" id="none">Nie masz konta?<br> Zarejestruj się!</a>
            </button>
	</form>
    </div>
    </div>
    
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
    
    <div id="footer">
        Projekt na laboratoria Inżynierii Oprogramowania - Wypożyczalnia filmów
    </div>
    
</body>
</html>