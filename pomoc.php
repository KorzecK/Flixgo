<?php

	session_start();
	error_reporting(0);
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: panel.php');
		exit();
	}

    if($_POST['opinia'])
    {
    $tresc = $_POST['opinia'];
    $usr = $_SESSION['user'];
    require_once "connect.php";
    try
    {
        $polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
        if($polaczenie->query("INSERT INTO pomoc VALUES (NULL, '$usr','$tresc')"))
        {
           /* echo '<script type="text/JavaScript">
             alert("Wysłano pomyślnie");
            <script>';*/
            header('Location: user.php?user='.$_SESSION['user']);
        }
        else
        {
            throw new Exception($polaczenie->error);
        }
    }
    catch(Exception $e)
    {
        echo '<span style="color:red;">Błąd serwera! Przepraszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
        echo '<br />Informacja developerska: '.$e;
    }
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
    <!--Wysyłanie próśb o pomoc przez użytkowników. Uprawnienia uzytkowników połączone z ui-->
    <div id="baner_inf">
    <form method="post">
        
    Treść zapytania pomocy: <br /> <textarea rows="5" cols="80" id="lot_text"  name="opinia" ></textarea><br /><br>
        <input type="submit" value="Prześij" id="zaloguj_sie"/>
    </form>
        
        <?php

    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    if (mysqli_connect_errno())
    {
        echo "Wystąpił błąd połączenia z bazą";
    }
    $wybor = $_GET['user'];
    echo "<link rel='stylesheet' href='style1.css' type='text/css'/>";
    $wynik = mysqli_query($polaczenie,"SELECT * FROM uzytkownicy where user='$wybor'");
    while($row = mysqli_fetch_array($wynik))
{
    
	if($_GET['user'] == $_SESSION['user'])
    {
    echo "<br><button id='zaloguj_sie'>";
     echo "<a id='none' href=".'user.php?user='.$row['user'].'>Powrót</a></button><br>';
    }
    else
    {
        header('Location: user.php?user='.$_SESSION['user']);
    }
    }
    mysqli_close($polaczenie);
?>
        
    </div>
</body>
</html>