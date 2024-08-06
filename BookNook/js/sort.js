const sort = document.querySelector('.sort__main');
const extrasort = document.querySelector('.sort__extra');

sort.addEventListener('click', function () {
	extrasort.style.display = "block";
})

extrasort.addEventListener('click', function () {
	extrasort.style.display = "none";
})


const sortmob = document.getElementById("sortmob");
const extrasortmob = document.getElementById("sortmobform");

sortmob.addEventListener('click', function () {
	extrasortmob.style.display = "block";
})

extrasortmob.addEventListener('click', function () {
	extrasortmob.style.display = "none";
})


const moblist = document.querySelector('.hgenres');
const mobgenre = document.getElementById("mobgenre");

mobgenre.addEventListener('click', function () {
	moblist.style.display = "block";
})

const head = document.querySelector('.header');

head.addEventListener('click', function (event) {
	let e = moblist;
	if (!e.contains(event.target)) e.style.display = 'none';
});

