const qualify_formats = ["Онлайн", "Офлайн"];

async function fetchData() {
  const response = await fetch("../../php/qualify.php");
  const docs = await response.json();
  return docs.docs.map((item) => {
    item.filetype = item.link.substring(item.link.lastIndexOf(".") + 1);

    return item;
  });
}
async function fetchCourse() {
  const response = await fetch("../../php/qualify.php");
  const courses = await response.json();
  return courses.courses.map((item) => {
    item.filetype = item.link.substring(item.link.lastIndexOf(".") + 1);
    const parts = item.date.split("-");
    item.date = `${parts[2]}.${parts[1]}.${parts[0]}`;
    return item;
  });
}

async function fetchAdmin() {
  const response = await fetch("../../php/qualify.php");
  const data = await response.json();
  return data.admin;
}

const content = document.getElementById("content");
const course = document.getElementById("course");

async function CreateBlock() {
  const data = await fetchData();
  console.log(data);
  const admin = await fetchAdmin();
  console.log(admin);
  data.forEach((item) => {
    CreateDoc(item.id, item.title, item.filetype, admin, item.link);
  });
  if (admin) {
    let button_create = document.createElement("a");
    button_create.classList.add("button__item", "admin__add");
    button_create.href = "../admin/qualify/create.php";
    button_create.textContent = "Додати";
    content.append(button_create);
    const item_delete = document.querySelectorAll(".admin__del_doc");

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

async function CreateCourseBlock() {
  const courses = await fetchCourse();
  const admin = await fetchAdmin();
  console.log(admin);
  courses.forEach((item) => {
    CreateCourse(item.id, item.title, item.link, item.format, item.date, admin);
  });
  if (admin) {
    let button_create = document.createElement("a");
    button_create.classList.add("button__item", "admin__add");
    button_create.href = "../admin/qualify/createcourse.php";
    button_create.textContent = "Додати";
    course.append(button_create);
    const item_delete = document.querySelectorAll(".admin__del_course");

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
}

function CreateDoc(id, title, filetype, admin, link) {
  let article = document.createElement("article");
  article.classList.add("catalog__container-content-list__item");
  article.ariaLabel = "Файл кваліфікації";
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
    edit.href = "../admin/qualify/edit.php?id=" + id;
    edit.innerHTML = '<img src="../admin/public/planner/icons/edit.svg">';
    edit.classList.add("admin__icon", "admin__edit");
    let del = document.createElement("a");
    del.href = "../admin/actions/delete.php?id=" + id;
    del.innerHTML = '<img src="../admin/public/planner/icons/delete.svg">';
    del.setAttribute("data-filename", title);
    del.classList.add("admin__icon", "admin__delete", "admin__del_doc");
    div_admin.append(edit, del);
    div.append(div_admin);
  }
  article.append(div);
  content.appendChild(article);
}

function CreateCourse(id, name, link, format, date, admin) {
  let article = document.createElement("article");
  article.classList.add("qual__container-list-block");
  article.ariaLabel = "Курс підвищення кваліфікації";
  let div_title = document.createElement("div");
  div_title.classList.add("qual__container-list-block-title");
  let title = document.createElement("h3");
  let span_title = document.createElement("span");
  span_title.classList.add("qual__container-list-block-text-bold");
  span_title.textContent = name;
  title.appendChild(span_title);
  div_title.appendChild(title);
  if (admin) {
    let div_admin = document.createElement("div");
    div_admin.classList.add("news__container-block-file-inner__admin");
    let edit = document.createElement("a");
    edit.href = "../admin/qualify/editcourse.php?id=" + id;
    edit.innerHTML = '<img src="../admin/public/planner/icons/edit.svg">';
    edit.classList.add("admin__icon", "admin__edit");
    let del = document.createElement("a");
    del.href = "../admin/actions/deletecourse.php?id=" + id;
    del.innerHTML = '<img src="../admin/public/planner/icons/delete.svg">';
    del.setAttribute("data-filename", name);
    del.classList.add("admin__icon", "admin__delete", "admin__del_course");
    div_admin.append(edit, del);
    article.append(div_admin);
  }
  let div_date = document.createElement("div");
  div_date.classList.add("qual__container-list-block-start");
  let p = document.createElement("p");
  let span_date = document.createElement("span");
  span_date.classList.add("qual__container-list-block-text-bold");
  span_date.textContent = "Початок:";
  let p_date = document.createElement("p");
  p_date.classList.add("qual__container-list-block-text-light");
  p_date.textContent = date;
  p.append(span_date, p_date);
  div_date.append(p);
  let div_format = document.createElement("div");
  div_format.classList.add("qual__container-list-block-link");
  let p_format = document.createElement("p");
  let span_f = document.createElement("span");
  let span_format = document.createElement("span");
  span_f.classList.add("qual__container-list-block-text-bold");
  span_format.classList.add("qual__container-list-block-text-light");
  span_f.textContent = "Тип:";
  span_format.textContent = qualify_formats[format];
  p_format.append(span_f, span_format);
  div_format.appendChild(p_format);
  let div_link = document.createElement("div");
  div_link.classList.add("qual__container-list-block-link");
  let a = document.createElement("a");
  a.href = link;
  a.ariaLabel = "Перейти до реєстрації на курс";
  a.classList.add("qual__container-list-block-text-bold");
  a.textContent = "Посилання на курс";
  div_link.appendChild(a);
  article.append(div_title, div_date, div_format, div_link);
  course.appendChild(article);
}

CreateBlock();
CreateCourseBlock();
