<?php


	session_start();

	if((!isset($_POST['login'])) || (!isset($_POST['haslo']))){
		header('Location: index.php');
		exit();
	}

	require_once "connect.php";

	$connection = @new mysqli($host, $db_user, $db_password, $db_name); //at sprawia, że komunikat o błędzie połącznia nie jest wyrzucany na ekran


	if($connection->connect_errno!=0){
		echo "Error: ".$connection->connect_errno;
	}else{

		$login = $_POST['login'];
		$haslo = $_POST['haslo'];

		$login = htmlentities($login, ENT_QUOTES, "UTF-8");

		$sql = "SELECT * FROM users WHERE login='$login' AND password='$haslo'";

		if($result = @$connection->query(sprintf("SELECT * FROM users WHERE login='%s'", mysqli_real_escape_string($connection,$login)))){
		
			$number_of_users = $result->num_rows;

			if($number_of_users>0){
		
				$user_data = $result->fetch_assoc(); //user_data przechowuje cały rekord uzyskany przy połączniu dla danego loginu i hasła;
				
				if(password_verify($haslo, $user_data['password'])){
					$_SESSION['loggedin']=true;
					$_SESSION['user'] = $user_data['login']; // w danej sesji, do zmiennej user wpisuję pole login z rekordu danego uzytkownika tabeli users
					$_SESSION['email'] = $user_data['email'];

					unset($_SESSION['loginerror']);
					$result->free(); //zwalnianie pamięci
					header('Location: zalogowany.php');
				}
				else{
				$_SESSION['loginerror']='<span style="color:red"> Nieprawidłowy login lub hasło';
				header('Location: index.php');
				}

			}else{
				$_SESSION['loginerror']='<span style="color:red"> Nieprawidłowy login lub hasło';
				header('Location: index.php');
			}

		}else{

		}

		//echo "dziala";

		$connection->close();
	}

?>