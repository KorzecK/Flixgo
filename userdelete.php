<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: admin.php');
		exit();
	}

?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <link rel="stylesheet" href="style1.css" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="header">
    <a href="panel.php" id="none"><h1>FlixGo</h1></a>
    </div>
<?php
    echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno())
    {
        echo "Wystąpił błąd połączenia z bazą";
    }
    $wybor = $_GET['user'];
    $wynik = mysqli_query($polaczenie,"SELECT * FROM uzytkownicy where user='$wybor'");
    while($row = mysqli_fetch_array($wynik))
{
    
	if($_GET['user'] == $_SESSION['user'])
    {
        //echo $_GET['film'];
        echo "<div id='baner_inf'>";
        echo "Czy na pewno chcesz usunąć swoje konto?<br><br>";
        echo "<button id='zaloguj_sie'>";
        echo "<a id='none' href=".'user.php?user='.$_SESSION['user'].">Powrót</a></button><br><br><button id='usunkonto'>";
        echo "<a id='none' href='usunkonto.php'>Usuń konto</a></button><br>";
        echo "</div>";
    }
    else
    {
        header('Location: user.php?user='.$_SESSION['user']);
    }
    }
    mysqli_close($polaczenie);
?>

</body>
</html>