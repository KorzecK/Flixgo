<?php

	session_start();
	
	if (isset($_POST['tytul']))
	{
		//Flaga
		$wszystko_OK=true;
		
		//Sprawdź opis
		$opis = $_POST['opis'];
		
		if ((strlen($opis)<4) || (strlen($opis)>2000))
		{
			$wszystko_OK=false;
			$_SESSION['e_opis']="Opis musi posiadać od 4 do 2000 znaków!";
		}	
		
				
		
		//Zapamiętaj wprowadzone dane
		//$_SESSION['fr_tytul'] = $tytul;
		//$_SESSION['fr_opis'] = $opis;
        $tytul = $_POST['tytul'];
        $opis = $_POST['opis'];
        $gatunek = $_POST['gatunek'];
        $cena = $_POST['cena'];
        $ocena = $_POST['ocena'];
        $img = $_POST['img'];
		require_once "connect.php";
		mysqli_report(MYSQLI_REPORT_STRICT);
		
		try 
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				
				if ($wszystko_OK==true)
				{
					
					if ($polaczenie->query("INSERT INTO filmy (id, tytul, opis, gatunek, cena, ocena, img) VALUES (NULL, '$tytul', '$opis', '$gatunek', cast('$cena' as float), cast('$ocena' as float), '$img')"))
					{
						$_SESSION['udanarejestracja']=true;
						header('Location: adminpanel.php');
					}
					else
					{
						throw new Exception($polaczenie->error);
					}
					
				}
				
				$polaczenie->close();
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
	<script src='https://www.google.com/recaptcha/api.js'></script>
	<link rel="stylesheet" href="style1.css?version=51" type="text/css"/>
	<style>
		.error
		{
			color:red;
			margin-top: 10px;
			margin-bottom: 10px;
		}
	</style>
</head>

<body>
	<div id="header">
    <a href="adminpanel.php"><h1>FlixGo</h1></a>
    </div>
    <!--Panel dodania filmu do bazy. Administrator połączony z uprawnieniami administratora i z ui-->
	<!--Testowanie fragmentu kodu-->
	<!--Funckja "Dodawaniefilmów()" w klasie "Uprawnienia odnośnie filmów"-->
	<!--Funkcja dodawania filmów działa na zasadzie wysyłanego formularza, który modyfikuje dane w bazie-->
	<form method="post">
	
		Tytuł: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_tytul']))
			{
				echo $_SESSION['fr_tytul'];
				unset($_SESSION['fr_tytul']);
			}
		?>" name="tytul" /><br />
		
		<?php
			if (isset($_SESSION['e_tytul']))
			{
				echo '<div class="error">'.$_SESSION['e_tytul'].'</div>';
				unset($_SESSION['e_tytul']);
			}
		?>
		

		
		Opis: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_opis']))
			{
				echo $_SESSION['fr_opis'];
				unset($_SESSION['fr_opis']);
			}
		?>" name="opis" /><br />
		
		<?php
			if (isset($_SESSION['e_opis']))
			{
				echo '<div class="error">'.$_SESSION['e_opis'].'</div>';
				unset($_SESSION['e_opis']);
			}
		?>
        
        
        Gatunek: <br /> <select name="gatunek" id="wybor-gatunek">
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
        </select><br>
		
		<?php
			if (isset($_SESSION['e_gatunek']))
			{
				echo '<div class="error">'.$_SESSION['e_gatunek'].'</div>';
				unset($_SESSION['e_gatunek']);
			}
		?>
        
        Cena: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_cena']))
			{
				echo $_SESSION['fr_cena'];
				unset($_SESSION['fr_cena']);
			}
		?>" name="cena" /><br />
		
		<?php
			if (isset($_SESSION['e_cena']))
			{
				echo '<div class="error">'.$_SESSION['e_cena'].'</div>';
				unset($_SESSION['e_cena']);
			}
		?>
        
        
        Ocena: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_ocena']))
			{
				echo $_SESSION['fr_ocena'];
				unset($_SESSION['fr_ocena']);
			}
		?>" name="ocena" /><br />
		
		<?php
			if (isset($_SESSION['e_ocena']))
			{
				echo '<div class="error">'.$_SESSION['e_ocena'].'</div>';
				unset($_SESSION['e_ocena']);
			}
		?>

        Nazwa pliku z okładką: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_img']))
			{
				echo $_SESSION['fr_img'];
				unset($_SESSION['fr_img']);
			}
		?>" name="img" /><br />
		
		<?php
			if (isset($_SESSION['e_img']))
			{
				echo '<div class="error">'.$_SESSION['e_img'].'</div>';
				unset($_SESSION['e_img']);
			}
		?>
		
		<br />
		
		<input type="submit" value="Dodaj Film" />
		
	</form>

</body>
</html>