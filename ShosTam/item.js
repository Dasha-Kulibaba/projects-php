const main_image = document.getElementById("image-main");
const image1 = document.getElementById("img-1");
const image2 = document.getElementById("img-2");
const image3 = document.getElementById("img-3");

image1.addEventListener("click", function () {
	let reserve = main_image.getAttribute('src');
	main_image.setAttribute('src', image1.getAttribute('src'));
	image1.setAttribute('src', reserve);
})

image2.addEventListener("click", function () {
	let reserve = main_image.getAttribute('src');
	main_image.setAttribute('src', image2.getAttribute('src'));
	image2.setAttribute('src', reserve);
})

image3.addEventListener("click", function () {
	let reserve = main_image.getAttribute('src');
	main_image.setAttribute('src', image3.getAttribute('src'));
	image3.setAttribute('src', reserve);
})