const more = document.querySelector('.writing__more');

more.onclick = function (e) {
	document.querySelector('.writing__items').style.height = "max-content";
	more.style.display = "none";
}