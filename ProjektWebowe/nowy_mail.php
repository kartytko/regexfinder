<?php

	session_start();

	if($_SESSION['loggedin']==false){
		header('Location: index.php');
		exit(); //linia potrzebna, by reszta pliku nie została wykonana
	}

	require_once "connect.php";

	$conn = @new mysqli($host, $db_user, $db_password, $db_name); //at sprawia, że komunikat o błędzie połącznia nie jest wyrzucany na ekran

	$login = $_SESSION['user'];
	$mail = $_POST['nowy_mail'];
	echo $mail;
	echo $login;
	//$login = mysql_real_escape_string($login);



	if($conn->connect_errno!=0){
		echo "Error: ".$conn->connect_errno;
	}else{
		$sql = "UPDATE users SET email='$mail' WHERE login='$login'";
		if ($conn->query($sql) === TRUE) {
			$_SESSION['emailchangeok']='zmieniono adres email';
			$_SESSION['email']=$mail;
			header('Location: index.php');
    	//	echo "Record updated successfully";
		} else {
			$_SESSION['emailchange']='<nie udało się zmienić adresu email';
			header('Location: index.php');
		//    echo "Error updating record: " . $conn->error;
		}

		$conn->close();
	}

?>
