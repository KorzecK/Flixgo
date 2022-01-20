<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: index.php');
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
    <div id="page">
    
    <?php
        error_reporting(0);
require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if ($polaczenie->connect_errno!=0)
{
    echo "Wystąpił błąd połączenia z bazą";
}
    $zmienna = 0;
        if($_POST['gatunek']&&$_POST['gatunek']!="Wszystkie gatunki")
        {
            $tmp = $_POST['gatunek'];
            $wynik = mysqli_query($polaczenie,"SELECT * FROM filmy where gatunek='$tmp'");
        }
        else if($_POST['gatunek']=="Wszystkie gatunki")
        {
            $wynik = mysqli_query($polaczenie,"SELECT * FROM filmy");
        }
        else
        {
$wynik = mysqli_query($polaczenie,"SELECT * FROM filmy");
        }
    
    echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
    echo "<table style='width:60%;'>";
    echo "<tr>";
while($row = mysqli_fetch_array($wynik))
{
    //Wypisanie danych filmów (przeglądarka) z bazy danych (klasa "ui" połączona z bazą danych)
    echo "<td id='zpanelu'>";
    echo "<a href=".'stronafilmu.php?film='.$row['id'].'>';
    echo "<img id='okldk' src="."img/".$row['img']." alt=".$row['tytul']." class='okladka'>"; 
    echo "</td>";
    echo "</a>";
    $zmienna++;
    if($zmienna%5==0)
    {
        echo "</tr>";
    }
}

mysqli_close($polaczenie);

    echo "</tr>";
    echo "</table>";
        
?>     
    </div>
    
    
	<div id="panel2">
<?php
    echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
    require_once "connect.php";
	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    //Wypisanie z bazy danych, danych użytkownika (Klasa "użytkownik")
    $nazwa = $_SESSION['user'];
    $wynik = mysqli_query($polaczenie,"SELECT * FROM uzytkownicy where user='$nazwa'");
    $row = mysqli_fetch_array($wynik);
    echo "<div id='user'>";
	echo "<h2><a href=".'user.php?user='.$row['user'].'>'.$row['user'].'</a></br>';
    echo "<img src="."awatar/".$_SESSION['awatar']." id='avatar_u1'/></br>";
    echo "<button id='zaloguj_sie'>";
    echo '<a href="logout.php" id='."none".'>Wyloguj się</a></h2>';
    echo "</button>";
    echo "<hr>";
    //echo "</div>";
	//echo "<p><b>E-mail</b>: ".$_SESSION['email'];
?>
        <!--Początek klasy "Wyszukiwarka"-->
        <!--Na podstawie formularza wyciąga dane z baz danych i jest osadzona w klasie "ui" (Interfejs użytkownika)-->
        <br><br>
        <form method="post">
        Posortuj po Gatunku: <br /> <select name="gatunek" id="zaloguj_sie">
        <option value="Wszystkie gatunki">Wszystkie gatunki</option>
        <option value="Film akcji">Film akcji</option>
        <option value="Film animowany">Film animowany</option>
        <option value="Film dokumentalny">Film dokumentalny</option>
        <option value="Dramat">Dramat</option>
        <option value="Komedia">Komedia</option>
        <option value="Kryminał">Kryminał</option>
        <option value="Horror">Horror</option>
        <option value="Film Sci-Fi">Film Sci-Fi</option>
        <option value="Film przygodowy">Film przygodowy</option>
        <option value="Thriller">Thriller</option>
        <option value="Western">Western</option>
        <option value="Film familijny">Film familijny</option>
        <option value="Film obyczajowy">Film obyczajowy</option>
        </select><br><br>
        <input type="submit" value="Sortuj" id="zaloguj_sie"/>
        </form>
        <!--Koniec klasy "Wyszukiwarka-->
</div>
    </div>
</body>
</html>