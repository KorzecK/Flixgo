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
    <link rel="stylesheet" href="style1.css?version=51" type="text/css"/>
</head>

<body>
	<div id="header">
    <a href="adminpanel.php"><h1>FlixGo</h1></a>
    </div>
<?php

require_once "connect.php";

	$polaczenie = @new mysqli($host, $db_user, $db_password, $db_name);

if (mysqli_connect_errno())
{
    echo "Wystąpił błąd połączenia z bazą";
}
    $zmienna = 0;
$wynik = mysqli_query($polaczenie,"SELECT * FROM filmy");

    
    echo "<style> 
    img
    {
        height:39vh;
        width:27vh;
    }
    img:hover 
    {
        box-shadow: 0 0 4px 2px rgba(0, 140, 186, 0.5);
    }
    
    </style>";
    echo "<table style='width:60%;'>";
    echo "<tr>";
while($row = mysqli_fetch_array($wynik))
{
    
    echo "<td>";
    echo "<a href=".'stronafilmu.php?film='.$row['id'].'>';
    echo "<img src="."img/".$row['img']." alt=".$row['tytul'].">"; 
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

</body>
</html>