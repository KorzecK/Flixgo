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
    <!--Wypisanie danych filmu z bazy danych na interfejs użytkownika-->
<?php

    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno())
    {
        echo "Wystąpił błąd połączenia z bazą";
    }
    $wybor = $_GET['film'];
    echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
    $wynik = mysqli_query($polaczenie,"SELECT * FROM filmy where id= $wybor");
    while($row = mysqli_fetch_array($wynik))
{
    
	if($_GET['film'])
    {
        //echo $_GET['film'];
        echo "<div id='opisfilmu'>";
        echo "<table id='opsflm'>";
        echo "<tr id='opsflm'><td colspan='3' id='opsflm'><b><h2>";
        echo $row['tytul'];
        echo "</h2></b></td></tr>";
        echo "<tr id='opsflm'><td rowspan='3' width='40%' id='opsflm'>";
        echo "<img id='oklbig' src="."img/".$row['img']." >";
        echo "</td><td width='20%' height='15%' id='opsflm'><b>Gatunek:</b></br>";
        echo $row['gatunek'];
        echo "</td><td width='20%' id='opsflm'><b>Ocena:</b></br>";
        echo $row['ocena'];
        echo "</td></tr><tr id='opsflm'><td colspan='2' id='opsflm'><b>Opis:</b></br>";
        echo $row['opis'];
        echo "</tr></td><tr id='opsflm'><td height='15%' id='opsflm'>";
        echo "<button type='button' id='button_blue'>";
        echo "<a id='none' href="."wypozyczenie.php?film=".$row['id'].">";
        echo "Wypożycz za </br>".$row['cena']." zł";
        echo "</button></a></td><td>";
        
        $userr = $_SESSION['user'];
        $idf = $row['id'];
        $wynik2 = mysqli_query($polaczenie,"SELECT test FROM wypozyczenia where (user= '$userr' and id_filmu = '$idf')");
        $test = mysqli_fetch_array($wynik2);
        if($test)
        {
            echo "<button type='button' id='button_blue'>";
            echo "<a id='none' href="."player.php".">";
            echo "Obejrzyj film";
            echo "</button></a>";
        }
        else
        {
            echo "<button type='button' id='reject'>";
            echo "Wypożycz aby obejrzeć";
            echo "</button>";
        }
        
        echo "</td></tr>";
        echo "</table>";
        echo "</div>";
    }
    else
    {
        echo "Nie wybrano filmu";
    }
    }
    mysqli_close($polaczenie);
?>

</body>
</html>