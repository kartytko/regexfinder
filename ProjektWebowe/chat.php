<?php
	session_start();
	if(!$_SESSION['loggedin']){
		header('Location: index.php');
	}
?>

<!DOCTYPE HTML>
<html lang="pl">	
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>

		<title>REGEX 404</title>
		<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />

		<script>
		// Sprawdzanie czy checkbox zaznaczony (tylko wtedy wyswietla wiadomosci i mozna wysylac)
		function checked() {
			return document.getElementById("check").checked; // Zwraca boolean true jesli zaznaczony, false jesli nie
		}

		// Sprawdzanie czy wpisany nick i wiadomość
		function checkValues() {
			return document.getElementById("nick").value && document.getElementById("message").value; // Jesli wpisane zwraca true
		}

		// AJAX - wyswietlanie wiadomosci
		function update() {
			document.getElementById("chat").innerHTML = ""; // Wyczyszczenie czata (jak odznaczymy checkbox)

			var xmlhttp;
			if (window.XMLHttpRequest) { // Dla przegladarek IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else { // Dla przegladarek IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp.onreadystatechange=function() {
				if (xmlhttp.readyState==3 && xmlhttp.status==200) { // Ladowanie polaczenia
					if (checked()) { // Jesli checkbox zaznaczony to wyswietlenie wyniku dzialania skryptu messages.php
						document.getElementById("chat").innerHTML=xmlhttp.responseText;
					}
				}
				if (xmlhttp.readyState==4) { // Zamykanie polaczenia
					xmlhttp.open("GET","messages.php",true);
					xmlhttp.send();
				}
			}	
			xmlhttp.open("GET", "messages.php", true); // Specyfikacja typu polaczenia
			xmlhttp.send(); // Wyslanie zapytania do serwera
		}

		// AJAX - wysylanie wiadomosci
		function send() {
			var xmlhttp;
			if (window.XMLHttpRequest) {
				xmlhttp=new XMLHttpRequest();
			} else {
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}

		/*	xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState==4 && xmlhttp.status==200) {
					document.getElementById("debug").innerHTML=xmlhttp.responseText; // Do debugowania
				}
			}
		*/

			var nickValue = encodeURIComponent(document.getElementById("nick").value); // Pobranie nicku
			var messageValue = encodeURIComponent(document.getElementById("message").value); // Pobranie wiadomosci

			xmlhttp.open("GET", "send.php?nick="+nickValue+"&message="+messageValue, true); // Specyfikacja polaczenia z odpowiednimi parametrami do wykorzystania w PHP
													// (nick i wiadomosc)
			xmlhttp.send();

			document.getElementById("message").value = ""; 
		}
		</script>

	<!--fonts -->
		<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
	 	<link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet"> 


		<!-- css -->
		<link rel="stylesheet" href="css/styles_chat.css" type="text/css" title="main"/>

		

	</head>
	<body>
		<div id="maindiv">
			<div id="title">KOMUNIKATOR   -   
				<?php
					echo $_SESSION['user'];
				?>
			</div>
			
			<textarea rows="20" cols="80" id="chat" style="background: #FFF; color:black" disabled></textarea><br/>
			
			<div id="input">
				<span class="mymark">
					Rozpocznij czat
				</span>
				<input type="checkbox" name="check" id="check" onchange="update();"/>
				<br/>

				<span class="mymark">
					Podaj nick: 
				</span>
				<input type="text" placeholder="nick" name="nick" id="nick" /><br/>
			
				<span class="mymark">
					Wpisz wiadomość: 
				</span>
				<input type="text" placeholder="wiadomość" name="message" id="message" /><br/>
				<button type="button" class="submitbutton" value="Wyślij" onclick="if (checked() && checkValues()) { send(); } else { alert('wypełnij wszystkie pola'); }">Wyślij</button>
			</div>

			<br/>
			
			<a href="index.php">
				<div class="menutile">
					wróć
				</div>
			</a>
		
		</div>
		<div id="debug"></div>
	</body>
</html>
