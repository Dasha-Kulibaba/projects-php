const young_types = ["", "Пам'ятки", "Інструкції", "Методичні рекомендації"];

async function fetchData() {
  const response = await fetch("../../php/expo.php");
  const data = await response.json();
  return data.docs.map((item) => {
    const parts = item.create_date.split("-");
    item.year = `${parts[0]}`;
    item.filetype = item.link.substring(item.link.lastIndexOf(".") + 1);
    return item;
  });
}
async function fetchAdmin() {
  const response = await fetch("../../php/expo.php");
  const data = await response.json();
  return data.admin;
}

const content = document.getElementById("content");

async function CreateBlock(filter) {
  content.innerHTML = "";
  let data = await fetchData();
  console.log(data);
  const admin = await fetchAdmin();
  if (filter) {
    data = data.filter((item) => item.year == filter);
    content.innerHTML = "";
  }
  data.forEach((item) => {
    CreateItem(item.id, item.title, item.link, item.filetype, admin, item.name);
  });

  let button_create = document.createElement("a");
  button_create.classList.add("button__item", "admin__add");
  button_create.href = "../admin/exhibition/email.php";
  button_create.textContent = "Додати";
  content.append(button_create);

  const item_delete = document.querySelectorAll(".admin__delete");

  item_delete.forEach((item) => {
    item.addEventListener("click", function (event) {
      event.preventDefault();
      const conf = confirm(
        "Ви впевненні, що хочете видалити " + this.dataset.filename
      );
      if (conf) {
        window.location.href = this.href;
      }
    });
  });

  const docPreview = document.querySelectorAll(".preview");

  docPreview.forEach((item) => {
    item.addEventListener("click", function (event) {
      event.preventDefault();
      let src = item.dataset.src;
      let type = item.dataset.type;
      let scrollPos = window.scrollY;
      const block = document.getElementById("modal_body");
      block.classList.add("visible__calendar");
      document.body.style.height = "100vh";
      document.body.style.overflow = "hidden";
      const modal_content = document.getElementById("modal_content");
      if (type === "img") {
        modal_content.innerHTML = `<img src="${src}">`;
      } else {
        const pdfViewer = `<iframe src="../admin/${src}" id="modal_frame"></iframe>`;
        modal_content.innerHTML = pdfViewer;
      }
      window.scrollTo({ top: 0, behavior: "smooth" });
      document
        .getElementById("modal_close")
        .addEventListener("click", function () {
          block.classList.remove("visible__calendar");
          document.body.removeAttribute("style");
          window.scrollTo({ top: `${scrollPos}`, behavior: "smooth" });
        });
    });
  });
}

function CreateItem(id, title, link, filetype, admin, authorname) {
  let div = document.createElement("div");
  div.classList.add("news__container-block", "expo__block");
  let article = document.createElement("article");
  article.classList.add("expo__container-card");
  article.ariaLabel = "Фотогалерея експозиції 2025 року";
  let figure = document.createElement("figure");
  figure.classList.add("expo__container-card__figure", "preview");
  figure.setAttribute("data-src", "../admin/" + link);
  if (filetype == "pdf") {
    figure.setAttribute("data-type", "pdf");
    const pdfViewer = `<iframe  src="../admin/${link}" ></iframe>`;
    figure.innerHTML = pdfViewer;
  } else {
    let img_a = document.createElement("p");
    img_a.classList.add("expo__container-card__figure-icon-img");
    figure.setAttribute("data-type", "img");
    let img_img = document.createElement("img");
    img_img.src = "../admin/" + link;
    img_img.alt = title;
    img_img.loading = "lazy";
    img_a.appendChild(img_img);
    figure.appendChild(img_a);
  }
  let figcaption = document.createElement("figcaption");
  figcaption.classList.add("expo__container-card__figure-title");
  let p_title = document.createElement("p");
  p_title.textContent = title;
  p_title.classList.add("expo__container-card__figure-title-title");
  let p_author = document.createElement("p");
  p_author.textContent = authorname;
  p_author.classList.add("expo__container-card__figure-title-author");
  figcaption.append(p_title, p_author);
  figure.appendChild(figcaption);
  article.appendChild(figure);
  div.appendChild(article);
  if (admin) {
    let div_admin = document.createElement("div");
    div_admin.classList.add("news__container-block-file-inner__admin");
    let edit = document.createElement("a");
    edit.href = "../admin/exhibition/adminedit.php?id=" + id;
    edit.innerHTML = '<img src="../admin/public/planner/icons/edit.svg">';
    edit.classList.add("admin__icon", "admin__edit");
    let del = document.createElement("a");
    del.href = "../admin/actions/delete.php?id=" + id;
    del.innerHTML = '<img src="../admin/public/planner/icons/delete.svg">';
    del.setAttribute("data-filename", title);
    del.classList.add("admin__icon", "admin__delete");
    div_admin.append(edit, del);
    div.append(div_admin);
  }

  content.appendChild(div);
}

const check = document.querySelectorAll(".year_select");
check.forEach((item) => {
  if (item.classList.contains("active-pointer"))
    item.classList.remove("active-pointer");
  if (item.ariaSelected === "true") item.ariaSelected = "false";
  item.addEventListener("click", function () {
    item.classList.add("active-pointer");
    item.ariaSelected = "true";
    const filter = item.value;
    CreateBlock(filter);
  });
});

CreateBlock();
