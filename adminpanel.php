<?php

	session_start();
	
    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $wynik = mysqli_query($polaczenie,"SELECT * FROM administratorzy");
    while($row = mysqli_fetch_array($wynik))
    {
        if (!isset($_SESSION['zalogowany']))
	{
		header('Location: admin.php');
		exit();
	}
    if($_SESSION['user']!=$row['user'])
    {
        header('Location: panel.php');
		exit();
    }
    }
	
	
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <link rel="stylesheet" href="style1.css?version=51" type="text/css"/>
</head>

<body>
	<div id="header">
    <a href="adminpanel.php"><h1>FlixGo</h1></a>
    </div>
    <!--Początek klasy z uprawnieniami administratora połączona z ui-->
<?php

	echo "<p>Witaj ".$_SESSION['user'].'! [ <a href="adminlogout.php">Wyloguj się!</a> ]</p>';
    echo '<p>Dodaj film [ <a href="dodajfilm.php">Dodaj film</a> ]</p>';
    echo '<p>Przeglądaj filmy z bazy [ <a href="wyswietlfilmy.php">Wyswietl filmy</a> ]</p>';
    echo '<p>Przeglądaj feedback [ <a href="adminopinia.php">Sugestie/Opinie</a> ]</p>';
    echo '<p>Przeglądaj zgłoszenia pomocy [ <a href="adminpomoc.php">Pomoc</a> ]</p>';
?>

</body>
</html>