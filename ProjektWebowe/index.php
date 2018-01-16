<?php
	
	session_start();

	if(isset($_SESSION['loggedin']) && ($_SESSION['loggedin']==true)){
		header('Location: zalogowany.php');
		exit(); //linia potrzebna, by reszta pliku nie została wykonana
	}

	//walidacja danych w rejestracji
	if(isset($_POST['login_rej'])){
		$dobry_formularz = true;



		$login_rej = $_POST['login_rej'];

		if((strlen($login_rej)<3) || (strlen($login_rej)>15)){
			$dobry_formularz=false;
			$_SESSION['e_nick']="Login musi posiadać od 3 do 15 znaków";
		}

		if(ctype_alnum($login_rej)==false){
			$dobry_formularz = false;
			$_SESSION['e_nick']="Login może składać się tylko z cyfr i liter";
		}




		$email = $_POST['email'];

		if (preg_match("/^[a-zA-Z0-9_\-.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-.]+$/", $email, $match)){
      	}else{
      		$dobry_formularz = false;
      		$_SESSION['e_email']="Wprowadź poprawny e-mail";
      	}



      	$haslo1 = $_POST['haslo1'];
      	$haslo2 = $_POST['haslo2'];
      	if($haslo1!=$haslo2){
      		$dobry_formularz = false;
      		$_SESSION['e_haslo']='Hasła nie są identyczne';
      	}
      	if(strlen($haslo1)<8 || strlen($haslo1)>25){
      		$dobry_formularz = false;
      		$_SESSION['e_haslo']='Hasło powinno zawierać od 8 do 25 znaków';	
      	}
	
      	$haslo1_hash = password_hash($haslo1, PASSWORD_DEFAULT);
//      	echo $haslo1_hash; exit();


      	if(!isset($_POST['regulamin'])){
      		$dobry_formularz = false;
      		$_SESSION['e_regulamin']='Zaakceptuj regulamin';
      	}

      	require_once "connect.php";

      	mysqli_report(MYSQLI_REPORT_STRICT);
      	try{
      		$connection = new mysqli($host, $db_user, $db_password, $db_name);
      		
      		if($connection->connect_errno!=0){
				throw new Exception(mysqli_connect_errno());
			}else{
				//czy email jest w bazie?
				$result = $connection->query("SELECT id FROM users WHERE email='$email'");

				if(!$result){throw new Exception($connection->error);}

				$amount_of_found_users = $result->num_rows;
				if($amount_of_found_users>0){
					$dobry_formularz = false;
      				$_SESSION['e_email']='Istnieje już użytkownik z podanym adresem email';			
				}

				if($dobry_formularz){
					if($connection->query("INSERT INTO users VALUES (NULL, '$login_rej', '$haslo1_hash', '$email')")){
						$_SESSION['udanarejestracja']=true;

						//header('Location: zalogowany.php');
						//echo "UDALO SIE"
						;
					}else{
						throw new Exception($connection->error);
					}
				}
	
				$connection->close();
			}	

      	}catch(Exception $e){
      		echo "Błąd serwera";
      	}

	}


?>

<!DOCTYPE HTML>
<html lang="pl">	
<head>
	<meta charset="utf-8"/>
	<title>REGEX </title>
	<meta name="description" content="Find the regex that suits you" />
	<meta name="keywords" content="regex, pattern"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
	<link rel="stylesheet" href="css/styles_drugawersja.css" type="text/css"/>
	
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">


</head>



<body
<?php 
	if(isset($_SESSION['e_nick']) || isset($_SESSION['e_email']) || isset($_SESSION['e_haslo']) || isset($_SESSION['e_regulamin'])){
		echo ' onload="showPopupRejestracja(event)"';
	}
	if(isset($_SESSION['loginerror'])){
		echo ' onload="showPopupLogowanie(event)"';
	}
?>
>

	<div id="maindiv">
		
		<div id="logo">
			<img src="img/z.png" />	
		</div> 

		<div id="menu">
			
			<a onclick="showPopupLogowanie(event)">
				<div class="menutile">logowanie</div>  
			</a>
			
			<a onclick="showPopupRejestracja(event)">
				<div class="menutile">rejestracja</div>  
			</a>

			<a onclick="showPopupKontakt(event)">
				<div class="menutile">kontakt</div>  
			</a>
			
			<div style="clear:both"></div>		

		</div>


			


	</div>

	<div id="popup_logowanie">
    	<div class="popup_inner" id="popup_inner">
    		<div id="logowanie">


			<a onclick="closePopupLogowanie(event)" class="closebutton" style="text-align: right"> 
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
			</a>

				<h2>LOGOWANIE</h2>

				<form action="logowanie.php" method="post">
					<input type="text" placeholder="Login" name="login"/> <br/>
					<input type="password" placeholder="Hasło" name="haslo"/> <br/><br/>
					<input class="submitbutton" type="submit" value="Zaloguj"/>
				</form>
			
				<?php
					if(isset($_SESSION['loginerror'])){
						echo $_SESSION['loginerror'];
					}
				?>

			</div> 
		</div>    
    </div>


	


	<div id="popup_rejestracja">
    	<div class="popup_inner" id="popup_inner">
    		<div id="logowanie">


			<a onclick="closePopupRejestracja(event)" class="closebutton" style="text-align: right"> 
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
			</a>

				<h2>REJESTRACJA</h2>
				
				<?php
					if(isset($_SESSION['loginerror'])){
						unset($_SESSION['loginerror']);
					}
				?>

			<!--	<form onsubmit="if ((this.email.value == '') || (this.login.value == '') || (this.haslo.value == '') || (this.haslo2.value == '')) 
				{ alert('Uzupełnij puste pola'); return false }">-->
				
			<form method="post">
				<input type="text" placeholder="E-mail" name="email"/> 			
				<br/> <input type="text" placeholder="Login" name="login_rej"/> 
				<br/> <input type="password" placeholder="Hasło" name="haslo1"/> 
				<br/> <input type="password" placeholder="Powtórz hasło" name="haslo2">
				<br/> <input type="checkbox" name="regulamin"> Akceptuję <a href="">regulamin</a>
				<br/><br/><input type="submit" class="submitbutton" value="Zarejestruj"/>

				<?php 
					if(isset($_SESSION['e_email'])){
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
					if(isset($_SESSION['e_nick'])){
						echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
						unset($_SESSION['e_nick']);
					}
					if(isset($_SESSION['e_haslo'])){
						echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
					if(isset($_SESSION['e_regulamin'])){
						echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);	
					}			
				?>	
			</form>
				<!--</br>Rejestrując się, akceptujesz <a href="">regulamin</a>-->

			</div> 
		</div>    
    </div>


	<div id="popup_kontakt">
    	<div class="popup_inner" id="popup_inner">
    		<div id="logowanie">


			<a onclick="closePopupKontakt(event)" class="closebutton" style="text-align: right"> 
				<i class="fa fa-arrow-left" aria-hidden="true"></i>
			</a>

				<h2>KONTAKT</h2>
					Wszystkie uwagi i propozycje zmian proszę kierować na adres adres@domena.com
				<?php
					if(isset($_SESSION['loginerror'])){
						unset($_SESSION['loginerror']);
					}
				?>


			</div> 
		</div>    
    </div>




    <script src="js/popup_logowanie.js"></script>





</body>

</html>