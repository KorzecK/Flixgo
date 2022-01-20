<?php

	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: admin.php');
		exit();
	}
	
    if (isset($_POST['email']))
	{
		//Udana walidacja? Załóżmy, że tak!
		$wszystko_OK=true;
		
		//Sprawdź poprawność nickname'a
		$nick = $_POST['nick'];
		
		//Sprawdzenie długości nicka
		if ((strlen($nick)<3) || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków!";
		}
		
		if (ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawność adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email, FILTER_SANITIZE_EMAIL);
		
		if ((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres e-mail!";
		}
		
		//Sprawdź poprawność hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if ((strlen($haslo1)<8) || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if ($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne!";
		}	

		$haslo_hash = password_hash($haslo1, PASSWORD_DEFAULT);
		
        
				
		
		//Zapamiętaj wprowadzone dane
		$_SESSION['fr_nick'] = $nick;
		$_SESSION['fr_email'] = $email;
		$_SESSION['fr_haslo1'] = $haslo1;
		$_SESSION['fr_haslo2'] = $haslo2;
        $avatar = $_POST['avatar'];
        
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
                //Czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
                //$mail = $_SESSION['email'];
				if($ile_takich_maili>1)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail!";
				}		

				//Czy nick jest już zarezerwowany?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if (!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>1)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny.";
				}
				
                if ($wszystko_OK==true)
				{
					//Hurra, wszystkie testy zaliczone, dodajemy gracza do bazy
					$tmp = $_SESSION['id'];
					if ($polaczenie->query("UPDATE uzytkownicy SET
                    user = '$nick', 
                    pass = '$haslo_hash', 
                    email = '$email', 
                    awatar = '$avatar'
                    where id=".$tmp.";"))
					{
						header('Location: logoutchange.php');
                        
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
    <link rel="stylesheet" href="style1.css" type="text/css"/>
    <link href='http://fonts.googleapis.com/css?family=Advent+Pro&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="header">
    <a href="panel.php" id="none"><h1>FlixGo</h1></a>
    </div>
    <!--Użytkownik wykorzystuje uprawnienia do zmiany danych profilu w interfejsie użytkownika i modyfikuje dane w bazie-->
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
    
    }
    else
    {
        header('Location: user.php?user='.$_SESSION['user']);
    }
    }
    
    mysqli_close($polaczenie);
?>
    <div id="p_rej">
	<form method="post">
	
		Nickname: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_nick']))
			{
				echo $_SESSION['fr_nick'];
				unset($_SESSION['fr_nick']);
			}
		?>" name="nick" /><br />
		
		<?php
			if (isset($_SESSION['e_nick']))
			{
				echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
				unset($_SESSION['e_nick']);
			}
		?>
		
		E-mail: <br /> <input type="text" value="<?php
			if (isset($_SESSION['fr_email']))
			{
				echo $_SESSION['fr_email'];
				unset($_SESSION['fr_email']);
			}
		?>" name="email" /><br />
		
		<?php
			if (isset($_SESSION['e_email']))
			{
				echo '<div class="error">'.$_SESSION['e_email'].'</div>';
				unset($_SESSION['e_email']);
			}
		?>
		
		Twoje hasło: <br /> <input type="password"  value="<?php
			if (isset($_SESSION['fr_haslo1']))
			{
				echo $_SESSION['fr_haslo1'];
				unset($_SESSION['fr_haslo1']);
			}
		?>" name="haslo1" /><br />
		
		<?php
			if (isset($_SESSION['e_haslo']))
			{
				echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
				unset($_SESSION['e_haslo']);
			}
		?>		
		
		Powtórz hasło: <br /> <input type="password" value="<?php
			if (isset($_SESSION['fr_haslo2']))
			{
				echo $_SESSION['fr_haslo2'];
				unset($_SESSION['fr_haslo2']);
			}
		?>" name="haslo2" /><br />
        
        Wybierz awatar: 
        <br /> 
        <table style="text-align: center;"><tr padding=10px>
            <td><input type="radio" value="chomik.jpg" name="avatar" id="avatar1" checked/><label for="avatar1">Chomik</label></td>
        
        <td><input type="radio" value="kot.jpg" name="avatar" id="avatar2"/><label for="avatar2">Kot</label></td>
        
        <td><input type="radio" value="lis.jpg" name="avatar" id="avatar3"/><label for="avatar3">Lis</label></td>
        
        <td><input type="radio" value="zaba.jpg" name="avatar" id="avatar4"/><label for="avatar4">Żaba</label></td>
        
        <td><input type="radio" value="pies.jpg" name="avatar" id="avatar5"/><label for="avatar5">Pies</label></td>
        
        <td><input type="radio" value="kaczka.jpg" name="avatar" id="avatar6"/><label for="avatar6">Kaczka</label></td>
        </tr><tr style="padding-left:10px;">
        
        <td><img src="awatar/chomik.jpg" id="avatar"/></td>
        <td><img src="awatar/kot.jpg" id="avatar"/></td>
        <td><img src="awatar/lis.jpg" id="avatar"/></td>
        <td><img src="awatar/zaba.jpg" id="avatar"/></td>
        <td><img src="awatar/pies.jpg" id="avatar"/></td>
        <td><img src="awatar/kaczka.jpg" id="avatar"/></td>
		</tr>
          </table>  
    
		<br />
		
		<input type="submit" value="Zmień dane" id="zaloguj_sie"/>
        <input type="reset" id="zaloguj_sie">
		
	</form>
    </div>
</body>
</html>