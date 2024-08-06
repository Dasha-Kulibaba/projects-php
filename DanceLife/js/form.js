const fdname = document.getElementsByName("fd_name");
const fdemail = document.getElementsByName("fd_email");
const fdtel = document.getElementsByName("fd_tel");
const fdcomm = document.getElementsByName("fd_comment");
const fdbutton = document.getElementsByName("fd_submit");

const form = document.querySelector(".headform");

function Check(value, format) {
  let regex = format;
  console.log(regex);
  if (regex.test(value)) return true;
}

form.addEventListener("submit", function (e) {
  if (Check(fdname[0].value, /\d/)) {
    alert("Ім'я не повинне містити цифри");
    e.preventDefault();
  }
  if (!Check(fdemail[0].value, /^[^\s@]+@gmail\.(com|ua)$/)) {
    alert("Неправильно вказана електронна пошта");
    e.preventDefault();
  }
  if (!Check(fdtel[0].value, /^\+380\d{9}$/)) {
    alert("Неправильно вказаний номер телефону");
    e.preventDefault();
  }
});
