const planner_types = ["", "ОМО", "ЦК"];

async function fetchData() {
  const response = await fetch("../../php/planner.php");
  const data = await response.json();
  return data.docs.map((item) => {
    item.filetype = item.link.substring(item.link.lastIndexOf(".") + 1);
    return item;
  });
}
async function fetchAdmin() {
  const response = await fetch("../../php/planner.php");
  const data = await response.json();
  return data.admin;
}

const content = document.getElementById("content");

async function CreateBlock() {
  const data = await fetchData();
  console.log(data);
  const admin = await fetchAdmin();
  console.log(admin);
  data.forEach((item) => {
    CreateItem(item.id, item.title, item.type, item.filetype, admin, item.link);
  });
  if (admin) {
    let button_create = document.createElement("a");
    button_create.classList.add("button__item", "admin__add");
    button_create.href = "../admin/planner/create.php";
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
  }
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

function CreateItem(id, title, type, filetype, admin, link) {
  let article = document.createElement("article");
  article.classList.add("catalog__container-content-list__item");
  article.ariaLabel = "Матеріал";
  let div = document.createElement("div");
  div.classList.add("news__container-block-file-inner");
  let div_inner = document.createElement("div");
  div_inner.classList.add("news__container-block-file-inner__type");
  let img = document.createElement("img");
  img.classList.add("news__container-block-file-inner__type-img");
  img.src = "../../images/system/type-file/" + filetype + ".svg";
  img.alt = "Файл у форматі JPEG";
  img.loading = "lazy ";
  div_inner.appendChild(img);
  let div_title = document.createElement("div");
  div_title.classList.add("news__container-block-file-inner__title");
  let h = document.createElement("a");
  h.classList.add("news__container-block-file-inner__title-p");
  h.textContent = title;
  h.href = "../admin/" + link;
  if (filetype == "pdf") {
    h.classList.add("preview");
    h.setAttribute("data-src", "../admin/" + link);
    h.setAttribute("data-type", "pdf");
  } else if (filetype == "png" || filetype == "jpg") {
    h.classList.add("preview");
    h.setAttribute("data-src", "../admin/" + link);
    h.setAttribute("data-type", "img");
  }
  div_title.appendChild(h);
  div.append(div_inner, div_title);
  if (admin) {
    let div_admin = document.createElement("div");
    div_admin.classList.add("news__container-block-file-inner__admin");
    let edit = document.createElement("a");
    edit.href = "../admin/planner/edit.php?id=" + id;
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
  let div_desc = document.createElement("div");
  div_desc.classList.add("catalog__container-content-list__item-description");
  let div_sub = document.createElement("div");
  div_sub.classList.add("news__container-block-file-sub");
  let div_subtitle = document.createElement("div");
  div_subtitle.classList.add("news__container-block-file-inner__subtitle");
  let p_subtitle = document.createElement("p");
  p_subtitle.classList.add("news__container-block-file-inner__subtitle-p");
  p_subtitle.textContent = planner_types[type];
  div_subtitle.appendChild(p_subtitle);
  div_sub.append(div_subtitle);
  div_desc.appendChild(div_sub);
  article.append(div, div_desc);
  content.appendChild(article);
}

CreateBlock();
