const login = document.getElementById("login");
const pass = document.getElementById("password");
const pass_check = document.getElementById("pass_check");

const form = document.getElementById("form");

form.addEventListener("submit", function (e) {
  e.preventDefault();
  if (login.value.trim() === "") {
    alert("Заповніть поле логіну, можна використовувати лише латинські літери");
  } else if (pass.value.trim() === "") {
    alert("Заповніть поле паролю, можна використовувати лише латинські літери");
  } else if (pass.value != pass_check.value) {
    alert("Паролі не збігаються");
  } else form.submit();
});
