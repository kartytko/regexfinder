function showPopupLogowanie(event) {
    event.preventDefault();
    document.getElementById('popup_logowanie').style.display = 'block';
}

function closePopupLogowanie(event) {
    event.preventDefault();
    document.getElementById('popup_logowanie').style.display = 'none';
}


function showPopupRejestracja(event) {
    event.preventDefault();
    document.getElementById('popup_rejestracja').style.display = 'block';
}

function closePopupRejestracja(event) {
    event.preventDefault();
    document.getElementById('popup_rejestracja').style.display = 'none';
}


function showPopupKontakt(event) {
    event.preventDefault();
    document.getElementById('popup_kontakt').style.display = 'block';
}

function closePopupKontakt(event) {
    event.preventDefault();
    document.getElementById('popup_kontakt').style.display = 'none';
}


document.querySelector('#popup_logowanie').onload = function (event) {
    event.preventDefault();
    document.getElementById('popup_logowanie').style.display = 'block';
};