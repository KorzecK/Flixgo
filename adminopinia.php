<?php

	session_start();
	error_reporting(0);
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: panel.php');
		exit();
	}
?>
<!DOCTYPE HTML>
<html lang="pl">
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <link rel="stylesheet" href="style1.css?version=5" type="text/css"/>
</head>

<body>
	<div id="header">
    <a href="adminpanel.php"><h1>FlixGo</h1></a>
    </div>
    <!--Wypisanie z bazy danych wszystkich opinii/sugestii wysłanych przez użytkowników-->
<?php

    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno())
    {
        echo "Wystąpił błąd połączenia z bazą";
    }
    $wynik = mysqli_query($polaczenie,"SELECT * FROM opinie");
    echo "<table><tr><td><b>Użytkownik</b></td><td><b>Treść</b></td><tr>";
    while($row = mysqli_fetch_array($wynik))
    {
        echo "<td>";
        echo $row['user'];
        echo "</td><td>";
        echo $row['text'];
        echo "</td></tr>";
	
    }
    mysqli_close($polaczenie);
    echo "</tr>";
    echo "</table>";
?>

  
</body>
</html>