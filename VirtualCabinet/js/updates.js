const sections = [
  "",
  "Молодому викладачу",
  "Атестація викладачів",
  "Підвищення кваліфікації",
  "Методична виставка",
  "Планер",
];

async function fetchDocs() {
  const response = await fetch("../php/updates.php");
  const data = await response.json();
  return data.create.doc.map((item) => {
    item.section = String(sections[item.section_id]);
    const parts = item.create_date.split("-");
    item.create_date = `${parts[2]}.${parts[1]}.${parts[0]}`;
    return item;
  });
}
async function fetchCourse() {
  const response = await fetch("../php/updates.php");
  const data = await response.json();
  return data.create.course.map((item) => {
    item.section = sections[3];
    const parts = item.create_date.split("-");
    item.create_date = `${parts[2]}.${parts[1]}.${parts[0]}`;
    return item;
  });
}
async function fetchUpdDocs() {
  const response = await fetch("../php/updates.php");
  const data = await response.json();
  return data.update.doc.map((item) => {
    item.section = String(sections[item.section_id]);
    const parts = item.upd_date.split("-");
    item.upd_date = `${parts[2]}.${parts[1]}.${parts[0]}`;
    return item;
  });
}
async function fetchUpdCourse() {
  const response = await fetch("../php/updates.php");
  const data = await response.json();
  return data.update.course.map((item) => {
    item.section = sections[3];
    const parts = item.upd_date.split("-");
    item.upd_date = `${parts[2]}.${parts[1]}.${parts[0]}`;
    return item;
  });
}

const add_block = document.getElementById("last__add");
const upd_block = document.getElementById("last__upd");

async function CreateBlock() {
  const data_create = [...(await fetchDocs()), ...(await fetchCourse())];
  data_create.sort((a, b) => new Date(b.create_date) - new Date(a.create_date));
  const data_update = [...(await fetchUpdDocs()), ...(await fetchUpdCourse())];
  data_update.sort((a, b) => new Date(b.upd_date) - new Date(a.upd_date));
  data_create.splice(5);
  data_update.splice(5);
  console.log(data_create);
  console.log(data_update);
  data_create.forEach((item) => {
    CreateItem(item.title, item.section, item.create_date, add_block);
  });
  data_update.forEach((item) => {
    CreateItem(item.title, item.section, item.upd_date, upd_block);
  });
}

function CreateItem(title, section, date, block) {
  let li = document.createElement("li");
  li.classList.add("news__container-block-file");
  let div = document.createElement("div");
  div.classList.add("news__container-block-file-inner");
  let div_inner = document.createElement("div");
  div_inner.classList.add("news__container-block-file-inner__type");
  let img = document.createElement("img");
  img.classList.add("news__container-block-file-inner__type-img");
  img.src = "../images/system/type-file/pdf.svg";
  img.loading = "lazy";
  div_inner.appendChild(img);
  div.appendChild(div_inner);
  let div_title = document.createElement("div");
  div_title.classList.add("news__container-block-file-inner__title");
  let p_title = document.createElement("p");
  p_title.classList.add("news__container-block-file-inner__title-p");
  p_title.textContent = title;
  div_title.appendChild(p_title);
  div.appendChild(div_title);
  let div_sub = document.createElement("div");
  div_sub.classList.add("news__container-block-file-sub");
  let div_subtitle = document.createElement("div");
  div_subtitle.classList.add("news__container-block-file-inner__subtitle");
  let p_subtitle = document.createElement("p");
  p_subtitle.classList.add("news__container-block-file-inner__subtitle-p");
  p_subtitle.textContent = section;
  div_subtitle.appendChild(p_subtitle);
  let p_date = document.createElement("p");
  p_date.classList.add("news__container-block-file-inner__date");
  p_date.textContent = date;
  div_sub.append(div_subtitle, p_date);
  li.append(div, div_sub);
  block.appendChild(li);
}
CreateBlock();
