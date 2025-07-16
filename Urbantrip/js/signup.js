const login = document.getElementById("login");
const pass = document.getElementById("password");

const form = document.getElementById("form");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (login.value.trim() === "") {
    alert("Заповніть поле логіну, можна використовувати лише латинські літери");
  } else if (pass.value.trim() === "") {
    alert("Заповніть поле паролю, можна використовувати лише латинські літери");
  } else form.submit();
});
