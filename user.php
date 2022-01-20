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
	<div id="header" id="none">
    <a href="panel.php" id="none"><h1>FlixGo</h1></a>
    </div>
    <!--Wypisane wszystkie uprawnienia dane użytkownikowi. Uprawnienia połączone z interfejsem użytkownika-->
<?php

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
        echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
        //echo $_GET['film'];
       // echo "<div id='opisfilmu'>";
        echo "<table id='opisuser' style="."height:100%;".">";
        echo "<tr><td><b><h2>";
        echo $row['user'];
        echo "</h2></b></td></tr>";
        echo "<tr><td>";
        echo "<img id='avatar_u2' src="."awatar/".$row['awatar']." >";
        echo "</td></tr>";
        echo "<tr><td>";
        echo $row['email'];
        echo "</td></tr>";
        echo "<tr><td><br>";
        echo "<a href=".'userchange.php?user='.$row['user'].'><p>Zmień dane konta<br><br>';
        echo "<a href=".'userdelete.php?user='.$row['user'].'>Usuń konto<br><br>';
        echo "<a href=".'pomoc.php?user='.$row['user'].'>Napisz do działu pomocy<br><br>';
        echo "<a href=".'opinia.php?user='.$row['user'].'>Prześlij feedback</p><br>';
        echo "</td></tr>";
        echo "</table>";
        //echo "</div>";
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