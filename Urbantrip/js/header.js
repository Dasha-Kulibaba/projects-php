const menu = document.querySelector(".hide-menu");

if (document.querySelector(".avatar")) {
  const avatar = document.querySelector(".avatar");
  avatar.addEventListener("click", function (e) {
    menu.classList.toggle("show-menu");
  });
}
