<?php


	session_start();
	
    require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);
    $wynik = mysqli_query($polaczenie,"SELECT * FROM administratorzy");
    while($row = mysqli_fetch_array($wynik))
    {

	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true) && $_SESSION['user']!=$row['user'])
	{
		header('Location: panel.php');
		exit();
	}
if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: adminpanel.php');
		exit();
	}
    }
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>FlixGo - Najlepsza wypożyczalnia filmów w Polsce</title>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css?version=51" type="text/css"/>
</head>
<body>
   <div id="header">
    <a href="panel.php"><h1>FlixGo</h1></a>
    </div>
    <!--Panel logowania administratora. Klasa "Administrator" połączona z możliwością logowania-->
	<form action="zalogujadmin.php" method="post" id="p_log">
	
		Login: <br /> <input type="text" name="login" /> <br />
		Hasło: <br /> <input type="password" name="haslo" /> <br /><br />
		<input type="submit" value="Zaloguj się" align="center"/><br>
	</form>
	
    
<?php
	if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
?>
    
</body>
</html>