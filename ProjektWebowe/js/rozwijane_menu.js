function openNavKlasy() {
    //document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.height = "260px";
    document.getElementById("tytul_opisu").innerHTML = "KLASY ZNAKÓW";
    document.getElementById("opis").innerHTML = "Jeśli chcemy dopasować jeden znak z określonego zbioru znaków należy użyć klasy znaków. Klasa znaków to jeden lub większa liczba znaków ujętych w nawiasy kwadratowe. "; 
}

function openNavKwan() {
    //document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.height = "260px";
    document.getElementById("tytul_opisu").innerHTML = "KWANTYFIKATORY ZACHŁANNE";
    document.getElementById("opis").innerHTML = "Kwantyfikatory określają ilość powtórzeń znaków lub sekwencji we wzorcach. Domyślnie kwantyfikatory są zachłanne, tzn. starają się dopasować maksymalną możliwą ilość znaków w tekście."; 
}

function openNavZach() {
    //document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.height = "260px";
    document.getElementById("tytul_opisu").innerHTML = "KWANTYFIKATORY NIEZACHŁANNE";
    document.getElementById("opis").innerHTML = "Dodanie znaku zapytania po kwantyfikatorze przekształca go w kwantyfikator niezachłanny (leniwy). Kwantyfikator niezachłanny stara się dopasować minimalną możliwą ilość tekstu. "; 
}

function openNavAser() {
    //document.getElementById("mySidenav").style.width = "200px";
    document.getElementById("mySidenav").style.height = "260px";
    document.getElementById("tytul_opisu").innerHTML = "ASERCJE";
    document.getElementById("opis").innerHTML = "Asercje (kotwice) pozwalają wyznaczyć miejsce w tekście, w którym musi pojawić się dopasowanie. Asercje mają w dopasowaniu zerową długość. "; 
}

function closeNav() {
    //document.getElementById("mySidenav").style.width = "0";
	document.getElementById("mySidenav").style.height = "0";
}
