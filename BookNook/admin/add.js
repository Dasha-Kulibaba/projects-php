const bookcover = document.querySelector('.cover');
const previewImage = document.getElementById("previewImage");
const bookfile = document.querySelector('.bookfile');
bookcover.addEventListener("change", function () {
	const file = bookcover.files[0];
	if (file) {
		readAndPreview(file);
	}
});

function readAndPreview(file) {
	const reader = new FileReader();
	reader.onloadend = function () {
		previewImage.src = reader.result;
	};
	if (file) {
		reader.readAsDataURL(file);
	} else {
		previewImage.src = "";
	}
}
