const username = document.getElementById("username");
const userphone = document.getElementById("userphone");
const useremail = document.getElementById("useremail");
const usertext = document.getElementById("usertext");

const form = document.getElementById("form-question");
const button = document.getElementById("send");


username.addEventListener('change', function (e) {
	if (!username.value) {
		username.classList.add('error');

	}
	else
		if (username.value.match(/\d/g) != null) {
			username.classList.add('error');

		}
		else {
			username.classList.remove('error');

		}
})


userphone.addEventListener('change', function (e) {
	let phone = /^\+380\d{9}$/g;
	if (!userphone.value || !phone.test(userphone.value)) {
		userphone.classList.add('error');

	}
	else {
		userphone.classList.remove('error');
	}
}
)

useremail.addEventListener('change', function (e) {
	let email = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/g;
	if (!useremail.value || !email.test(useremail.value)) {
		useremail.classList.add('error');
	}
	else {
		useremail.classList.remove('error');
	}
})

usertext.addEventListener('change', function (e) {
	if (!usertext.value) useremail.classList.add('error');
	else {
		useremail.classList.remove('error');
	}
})

function Checkclass(elem) {
	if (elem.classList.contains('error')) {
		return true;
	}
	else return false;
}


form.addEventListener('submit', function (e) {
	if (Checkclass(username) || Checkclass(userphone) || Checkclass(useremail) || Checkclass(usertext)) {
		e.preventDefault();
	}
})






