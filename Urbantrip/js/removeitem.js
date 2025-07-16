const del = document.querySelectorAll(".item-delete");

for (let i = 0; i < del.length; i++) {
  del[i].addEventListener("click", function (e) {
    e.preventDefault();
    if (confirm("Ви впевнені що хочете видалити цей елемент?")) {
      window.location.href = del[i].getAttribute("href");
    }
  });
}
