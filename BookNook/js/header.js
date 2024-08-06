// меню


const MenuBook = document.querySelector('.menu__book');
const headmenu = document.querySelector('.header__genres');



MenuBook.addEventListener('mouseover', function () {
	headmenu.classList.add("block__visible");
})

headmenu.addEventListener('mouseover', function () {
	headmenu.classList.add("block__visible");
})


headmenu.addEventListener('mouseout', function () {
	headmenu.classList.remove("block__visible");
})

const burger = document.querySelector('.block');
const burger__item = document.querySelectorAll('.block__item');
const mobmenu = document.querySelector('.mobmenu');
const mobbook = document.querySelector('.mobmenu__item');



burger.addEventListener('click', function () {
	mobmenu.classList.toggle('block__visible');
	burger__item[0].classList.toggle('rotate45');
	burger__item[2].classList.toggle('rotate-45');
	burger__item[1].classList.toggle('displaynone');
	if (headmenu.classList.contains('block__visible'))
		headmenu.classList.remove("block__visible");

})

mobbook.addEventListener('click', function () {
	headmenu.classList.toggle("block__visible");
})




const searchicon = document.querySelector('.searchicon');

searchicon.addEventListener('click', function () {
	if (document.body.clientWidth <= 460) {
		document.querySelector('.search__mob').style.display = "flex";
		document.querySelector('.search__mob').style.top = "80px";
		document.querySelector('.search__mob-input').focus();
		document.querySelector('.search__mob-input').addEventListener("blur", function () {
			document.querySelector('.search__mob').style.display = "none";
		})
	}
	else if (document.body.clientWidth <= 1100) {
		document.querySelector('.search__mob').style.display = "flex";
		document.querySelector('.search__mob').style.top = "120px";
		document.querySelector('.search__mob-input').focus();
		document.querySelector('.search__mob-input').addEventListener("blur", function () {
			document.querySelector('.search__mob').style.display = "none";
		})
	}
})



const feedbackground = document.querySelector('.feedback');
const feedbackform = document.querySelector('.feedback__form');
const feedbacklink = document.querySelector('.feedback__link');
const feedback_close = document.querySelector('.feedback__close');

feedbacklink.addEventListener('click', function (e) {
	e.preventDefault();
	feedbackground.style.display = "block";
	feedback_close.addEventListener('click', function () {
		feedbackground.style.display = "none";
	})
})



const username = document.getElementById("username");
const useremail = document.getElementById("useremail");
const usertext = document.getElementById("usertext");
const form = document.querySelector('.feedback__form');
const button = document.getElementById("feedback");


username.addEventListener('change', function (e) {
	if (!username.value) {
		username.classList.add('error-feedback');
	}
	else
		if (username.value.match(/\d/g) != null) {
			username.classList.add('error-feedback');
		}
		else {
			username.classList.remove('error-feedback');
		}
})


useremail.addEventListener('change', function (e) {
	let email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g;
	if (!useremail.value || !email.test(useremail.value)) {
		useremail.classList.add('error-feedback');
	}
	else {
		useremail.classList.remove('error-feedback');
	}
})

usertext.addEventListener('change', function (e) {
	if (!usertext.value) useremail.classList.add('error-feedback');
	else {
		useremail.classList.remove('error-feedback');
	}
})

function Checkclass(elem) {
	if (elem.value == "") {
		elem.classList.add('error-feedback');
		return true;
	}
	if (elem.classList.contains('error-feedback')) {
		return true;
	}
	else return false;
}


form.addEventListener('submit', function (e) {
	if (Checkclass(username) || Checkclass(useremail) || Checkclass(usertext)) {
		e.preventDefault();
	}
})










