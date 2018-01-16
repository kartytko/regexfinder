<?php
	session_start();
	if(!$_SESSION['loggedin']){
		header('Location: index.php');
	}
?>

<!DOCTYPE HTML>
<html lang="pl">	
<head>
	<meta charset="utf-8"/>
	<title>REGEX 404</title>
	<meta name="description" content="Find the regex that suits you" />
	<meta name="keywords" content="regex, pattern"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>

	<!--fonts -->
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" type="text/css">
 	<link href="https://fonts.googleapis.com/css?family=Unica+One" rel="stylesheet"> 


	<!-- css -->
	<link rel="stylesheet" href="css/styles_zalogowany.css" type="text/css" title="main"/>
	<link rel="Alternate stylesheet" type="text/css" href="css/styles_zalogowany_ciemny.css" title="green" />
	

</head>



<body>

	<div id="maindiv">
		
		
		<div id="leftcontainer">
				
				<div id="mySidenavEmail" class="sidenav">
					<a href="javascript:void(0)" class="closebutton" onclick="closeNavEmail()">
				  		<i class="fa fa-arrow-up" aria-hidden="true"></i>
					</a>
				<div id="zmianaEmaila">
					<br/><br/>
					<form action="nowy_mail.php" method="post">
						<input id="nowy_mail" type="text" placeholder="wprowadź nowy email" name="nowy_mail" style="width: 180px;"/> <br/><br/>
						<input id="zatwierdzbutton" class="submitbutton" type="submit" value="Zatwierdź"/>
					</form>
					<?php
						if(isset($_SESSION['emailchange'])){
							echo $_SESSION['emailchange'];	
						}
						if(isset($_SESSION['emailchangeok'])){
							echo $_SESSION['emailchangeok'];
						}
					?>
				</div>					

				</div>


			<div id="zalogowany_logo">
				<img src="img/z.png" height="180px" />		
			</div>	

			<div id="leftmenu">
				
				<a href="chat.php"><span class="mymark"">Komunikator<br/></span></a>
				<span class="mymark" onclick="openNavEmail()">Zmień adres email<br/></span>
					<!--<div class="mymark" onclick="openNavEmail()">Zmień adres email<br/></iv>-->
				<span class="mymark">Skontaktuj się z adminem<br/></span>
				
			</div>

			<a href="logout.php">		
				<!-- tu może też mbyć leftmenutile, dla mniejszych buttonów-->
				<div class="menutile">wyloguj się</div>
			</a>


		</div>
		
		

		<div id="middlecontainer">
			<div id="mainactivity">
			
				<br/>
				<h2 style="text-align: center">
					<form action="" method="post">
						<input id="twoj_regex" type="text" placeholder="kot|mat\D{2}\d" name="twojregex"/> 
						<input id="sprawdzbutton" class="submitbutton" type="submit" value="Sprawdź" onclick="getFromTextarea(event)"/>
					</form>
				</h2>

				<div class="container">
				    <div class="backdrop">
				        <div id="textarea_input_highlights" class="highlights">Tutaj proszę wpisać tekst do sprawdzenia
Ala ma <mark>kot</mark>a, a <mark>kot</mark> ma Alę.
<mark>match1</mark>23 mat123 matchmatch <mark>matCH6</mark>3
				        </div>
				    </div>
				    <textarea id="textarea_input" onclick="Clear(event)">Tutaj proszę wpisać tekst do sprawdzenia	
Ala ma kota, a kot ma Alę.
match123 mat123 matchmatch matCH63
				    </textarea>
				</div>


			</div>			
		</div>
		


		<div id="rightcontainer">
			<!--<div id="focia" style="text-align: center; color: #FF0000;"></div>-->
			
			<div id="profil">			
				<div style="text-align: center; font-weight: bold"><?php 
					echo "Cześć, ".$_SESSION['user']."!"; 
					//echo '</br><a href="logout.php"> wyloguj się</a>';
				?></div>
				<?php 
					echo $_SESSION['email'];
				?>
			</div>

			<div id="matches">
				<div style='letter-spacing:1px'>Przechwycone grupy</div>
				<div class="helptile">
					<div class="numergrupy">grupa: 1</div>
					<div class="indeksy">49-52</div>
					<div class="dopasowanie">kot</div>
					<div style='clear: both;'></div>
				</div>
				<div class="helptile">
					<div class="numergrupy">grupa: 2</div>
					<div class="indeksy">57-60</div>
					<div class="dopasowanie">kot</div>
					<div style='clear: both;'></div>
				</div>
				<div class="helptile">
					<div class="numergrupy">grupa: 3</div>
					<div class="indeksy">69-75</div>
					<div class="dopasowanie">match1</div>
					<div style='clear: both;'></div>
				</div>
				<div class="helptile">
					<div class="numergrupy">grupa: 4</div>
					<div class="indeksy">96-102</div>
					<div class="dopasowanie">matCH6</div>
					<div style='clear: both;'></div>
				</div>
			</div>


			<div id="legend">
				<div id="mySidenav" class="sidenav">
					<a href="javascript:void(0)" class="closebutton" onclick="closeNav()">
				  		<i class="fa fa-arrow-up" aria-hidden="true"></i>
					</a>
					
					<div id="tytul_opisu">tytul_opisu</div>
					<div id="opis">opis</div>

				</div>







				LEGENDA<br/>
				<span style="font-size:30px;cursor:pointer" onclick="openNavKlasy()">
					<div class="legendtile" title="KLASY ZNAKÓW" style="background-color: #009f94">&ensp;<p class="hovertext"></p></div>
				</span>
				
				<span style="font-size:30px;cursor:pointer" onclick="openNavKwan()">
					<div class="legendtile" title="KWANTYFIKATORY WYRAŻEŃ REGULARNYCH" style="background-color: #827d00">&ensp;</div>
				</span>
				
				<span style="font-size:30px;cursor:pointer" onclick="openNavZach()">
					<div class="legendtile" title="KWANTYFIKATORY NIEZACHŁANNE" style="background-color: #f58026">&ensp;</div>
				</span>
				
				<span style="font-size:30px;cursor:pointer" onclick="openNavAser()">
					<div class="legendtile" title="ASERCJE" style="background-color: #ffc300">&ensp;</div>
				</span>
				
				<div style="clear:both;"></div>
			
			</div>


			<div id="help">

<!-- http://home.agh.edu.pl/~mkuta/tk/WyrazeniaRegularne.html -->
<!-- klasy znaków -->
				<div class="helptile">
					<div class="helppattern">.</div>
					<div class="helpdes">dowolny znak</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\d</div>
					<div class="helpdes">dowolna cyfra</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\D</div>
					<div class="helpdes">dowolny znak, oprócz cyfr</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\s</div>
					<div class="helpdes">dowolny biały znak</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\S</div>
					<div class="helpdes">dowolny znak, oprócz białych znaków</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\w</div>
					<div class="helpdes">dowolny znak alfanumeryczny</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\W</div>
					<div class="helpdes">dowolony znak, oprócz alfanumerycznych</div>
					<div class="helpflag" style="background-color: #009f94">.</div>
					<div style="clear: both;"></div>	
				</div>




<!-- kwantyfikatory wyrażeń regularnych -->
				<div class="helptile">
					<div class="helppattern">*</div>
					<div class="helpdes">zero lub więcej wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">+</div>
					<div class="helpdes">jeden lub więcej wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">?</div>
					<div class="helpdes">conajwyżej jedno wystąpienie</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">{n}</div>
					<div class="helpdes">dokładnie n wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">{n,}</div>
					<div class="helpdes">conajmniej n wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">{,m}</div>
					<div class="helpdes">conajwyżej m wystąpień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">{n,m}</div>
					<div class="helpdes">od n do m wstępień</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">[xyz]</div>
					<div class="helpdes">jeden znak spośród x, y i z</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">[^xyz]</div>
					<div class="helpdes">jeden znak spoza x, y i z</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">A|B</div>
					<div class="helpdes">dopasowanie A lub dopasowanie B</div>
					<div class="helpflag" style="background-color: #827d00">.</div>
					<div style="clear: both;"></div>	
				</div>			
<!-- kwantyfikatory niezachłanne-->

				<div class="helptile">
					<div class="helppattern">*?</div>
					<div class="helpdes">zero lub więcej wystąpień</div>
					<div class="helpflag" style="background-color: #f58026">.</div>
					<div style="clear: both;"></div>	
				</div>			


				<div class="helptile">
					<div class="helppattern">+?</div>
					<div class="helpdes">jedno lub więcej wystąpień</div>
					<div class="helpflag" style="background-color: #f58026">.</div>
					<div style="clear: both;"></div>	
				</div>			


				<div class="helptile">
					<div class="helppattern">??</div>
					<div class="helpdes">zero lub jedno wystąpienie</div>
					<div class="helpflag" style="background-color: #f58026">.</div>
					<div style="clear: both;"></div>	
				</div>			



				<div class="helptile">
					<div class="helppattern">{n,m}?</div>
					<div class="helpdes">od n do m wystąpień</div>
					<div class="helpflag" style="background-color: #f58026">.</div>
					<div style="clear: both;"></div>	
				</div>			


<!-- asercje -->

				<div class="helptile">
					<div class="helppattern">^</div>
					<div class="helpdes">początek tekstu</div>
					<div class="helpflag" style="background-color: #ffc300">.</div>
					<div style="clear: both;"></div>	
				</div>			


				<div class="helptile">
					<div class="helppattern">$</div>
					<div class="helpdes">koniec tekstu</div>
					<div class="helpflag" style="background-color: #ffc300">.</div>
					<div style="clear: both;"></div>	
				</div>			


				<div class="helptile">
					<div class="helppattern">\b</div>
					<div class="helpdes">pusty string na początku lub końca słowa</div>
					<div class="helpflag" style="background-color: #ffc300">.</div>
					<div style="clear: both;"></div>	
				</div>			


				<div class="helptile">
					<div class="helppattern">\B</div>
					<div class="helpdes">pusty string w środku słowa</div>
					<div class="helpflag" style="background-color: #ffc300">.</div>
					<div style="clear: both;"></div>	
				</div>			



				<div class="helptile">
					<div class="helppattern">(?=e)</div>
					<div class="helpdes">dopasowuje łańcuch, jeśli bezpośrednio po nim następuje wyrażenie e</div>
					<div class="helpflag" style="background-color: #ffc300">.</div>
					<div style="clear: both;"></div>	
				</div>			







				<!--
				<div class="helptile">
					<div class="helppattern">x?</div>
					<div class="helpdes">zero lub jedno x</div>
					<div style="clear: both;"></div>
				</div>
				
				<div class="helptile">
					<div class="helppattern">x*</div>
					<div class="helpdes">zero lub więcej x</div>
					<div style="clear: both;"></div>
				</div>

				<div class="helptile">
					<div class="helppattern">x+</div>
					<div class="helpdes">jedno lub więcej x</div>
					<div style="clear: both;"></div>
				</div>
				
				<div class="helptile">
					<div class="helppattern">x{5}</div>
					<div class="helpdes">dokładnie 5 x</div>
					<div style="clear: both;"></div>
				</div>
				
				<div class="helptile">
					<div class="helppattern">x{5,7}</div>
					<div class="helpdes">między 5, a 7 x</div>
					<div style="clear: both;"></div>
				</div>
				
				<div class="helptile">
					<div class="helppattern">x{5, }</div>
					<div class="helpdes">5 i więcej x</div>
					<div style="clear: both;"></div>
				</div>
				
				<div class="helptile">
					<div class="helppattern">[xyz]</div>
					<div class="helpdes">pojedynczy znak x, y lub z</div>
					<div style="clear: both;"></div>
				</div>
				

				<div class="helptile">
					<div class="helppattern">[^xyz]</div>
					<div class="helpdes">dowolony znak oprócz x, y lub z</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">[a-z]</div>
					<div class="helpdes">znak między a i z</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">.</div>
					<div class="helpdes">dowolony znak</div>
					<div style="clear: both;"></div>	
				</div>

				<div class="helptile">
					<div class="helppattern">\s</div>
					<div class="helpdes">dowolny biały znak</div>
					<div class="helpflag" style="background-color: red;"></div>
					<div style="clear: both;"></div>	
				</div>

-->

				<!--<span style="background-color: #DDDDDD; color: #444444; width: 10px; text-align: left;">x?</span>&ensp;	zero lub jedno x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px; text-align: left;">x*</span>&ensp;	zero lub więcej x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">x+</span>&ensp;	jedno lub więcej x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">x{5}</span>&ensp;	dokładnie 5 x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">x{5, }</span>&ensp;	5 lub więcej x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">x{5, 7}</span>&ensp;	między 5, a 7 x 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">[xyz]</span>&ensp;	pojedynczy znak x, y lub z 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">[^xyz]</span>&ensp;	dowolny znak oprócz x, y i z 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">[a-z]</span>&ensp;	znak między a i b 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">.</span>&ensp;	dowolny znak 
				<br/><span style="background-color: #DDDDDD; color: #444444; width: 10px;">\s</span>&ensp;	dowolony biały znak  -->

<!--
				<p>zero lub jedno x 				<span>x?</span></p><div style="clear: both"></div>
				<p>zero lub więcej x 				<span>x*</span></p><div style="clear: both"></div>
				<p>jedno lub więcej x 				<span>x+</span></p><div style="clear: both"></div>
				<p>dokładnie 5 x 					<span>x{5}</span></p><div style="clear: both"></div>
				<p>między 5, a 8 x 					<span>x{5,8}</span></p><div style="clear: both"></div>
				<p>conajmniej 5 x 					<span>x{5,}</span></p><div style="clear: both"></div>
				<p>pojedynczy znak x, y lub z  		<span>[xyz]</span></p><div style="clear: both"></div>
				<p>dowolony znak oprócz x, y i z  	<span>[^xyz]</span></p><div style="clear: both"></div>
				<p>znak pomiędzy a i z  			<span>[a-z]</span></p><div style="clear: both"></div>-->




				<!--<br/><p>jedno lub więcej x <span>x+</span></p>
				<br/><p>dokładnie 5 x<span>x{5}</span></p>
				<br/><p>między 5, a 8 z=x <span>x{5, 8}</span></p>-->
			</div>

		</div>
		<div style="clear: both"></div>
 		
 		<div id="stopka">
 			
		</div>

 	

</div>


<script src="js/rozwijane_menu.js"></script>
<script src="js/regex.js"></script>
<script src="js/zmien_email.js"></script>
</body>

</html>
