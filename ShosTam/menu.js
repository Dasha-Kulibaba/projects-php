document.addEventListener("DOMContentLoaded", function () {
	const smollmenuFlex = document.querySelector(".smollmenu-flex");
	const vector1 = document.querySelector(".vector1");
	const vector2 = document.querySelector(".vector2");
	const menu = document.querySelector(".menu");
	const serchBox = document.querySelector('.serchBox');
	let resserch = document.querySelector('.resserch');
	// let resserch2 = document.querySelector('#resserchinput');
	let resserchInput = document.querySelector('#resserchinput');
	serchBox.addEventListener("input", function () {
		let resaltInput = serchBox.value.trim();
		if (resaltInput !== '') {
			resserch.classList.add("resserchactivBox");
			resserchInput.classList.add("resserchactivBox");
			resserchInput.textContent = resaltInput;
		}
		else {
			resserchInput.textContent = " "
			resserch.classList.remove("resserchactivBox");
			resserchInput.classList.remove("resserchactivBox");
		}
	})
	smollmenuFlex.addEventListener("mouseover", function () {
		vector1.classList.remove("rotate0");
		vector2.classList.remove("rotate0");
		vector1.classList.add("rotate0");
		vector2.classList.add("rotate0");
	});

	smollmenuFlex.addEventListener("mouseout", function () {
		vector1.classList.remove("rotate0");
		vector2.classList.remove("rotate0");
		vector1.classList.add("rotate-90");
		vector2.classList.add("rotate-90");
	});
	smollmenuFlex.addEventListener("click", function () {
		vector1.classList.toggle("rotate0");
		vector2.classList.toggle("rotate0");
		vector1.classList.toggle("rotate180");
		vector2.classList.toggle("rotate-180");
		menu.classList.toggle("active");
	});

	// serchBox.addEventListener('keyup', event => {
	//    if (event.code === 'Enter') location.href = 'searchresult.html';
	// });

});