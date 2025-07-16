async function fetchEvents() {
  const response = await fetch("data.php");
  const data = await response.json();
  return data.events.map((event) => {
    const parts = event.date.split("-");
    event.date = `${parts[2]}`;
    event.month = parseInt(parts[1], 10);
    event.year = `${parts[0]}`;
    const times = event.time.split(":");
    event.time = `${times[0]}:${times[1]}`;
    return event;
  });
}

async function fetchWeeks() {
  const response = await fetch("data.php");
  const data = await response.json();
  return data.weeks.map((week) => {
    return week;
  });
}

async function fetchPsych() {
  const response = await fetch("data.php");
  const data = await response.json();
  return data.psych.map((psyc) => {
    return psyc;
  });
}

const calendar = document.getElementById("calendar");
const months = [
  "Січень",
  "Лютий",
  "Березень",
  "Квітень",
  "Травень",
  "Червень",
  "Липень",
  "Серпень",
  "Вересень",
  "Жовтень",
  "Листопад",
  "Грудень",
];
const weekdays = ["Понеділок", "Вівторок", "Середа", "Четвер", "П'ятниця"];
const counts = ["", "I", "II", "III", "IV", "V"];
let i = 1;
const today = new Date();
const year_now = document.getElementById("year");

let month_counter = today.getMonth();
let year_counter = today.getFullYear();

function startWeek(name) {
  weekname = name.find((item) => item.week_number == i);
  let week = document.createElement("div");
  week.classList.add("week_name");
  let p = document.createElement("p");
  p.textContent = counts[i] + " Тиждень";
  week.append(p);
  if (weekname !== undefined) {
    let p_2 = document.createElement("p");
    p_2.textContent = weekname.title;
    week.append(p_2);
    let edit = document.createElement("a");
    edit.href = "editweek.php?id=" + weekname.id;
    edit.innerHTML = '<img src="../public/planner/icons/edit.svg">';
    edit.classList.add("icon", "icon-edit");
    let del = document.createElement("a");
    del.href = "../actions/deleteweek.php?id=" + weekname.id;
    del.innerHTML = '<img src="../public/planner/icons/delete.svg">';
    del.classList.add("icon", "icon-del");
    week.append(edit, del);
  } else {
    let adding = document.createElement("a");
    adding.href =
      "createweek.php?week=" +
      i +
      "&month=" +
      year_counter +
      "-" +
      String(month_counter + 1).padStart(2, "0");
    adding.innerHTML = '<img src="../public/planner/icons/add.svg">';
    adding.classList.add("add_event");
    week.appendChild(adding);
  }

  i++;
  calendar.appendChild(week);
}

function createDay(day, cevent, clas) {
  let div = document.createElement("div");
  clas = clas ?? "day";
  div.classList.add(clas);
  div.textContent =
    day.getDate() + "." + String(day.getMonth() + 1).padStart(2, "0");
  cevent = cevent.filter(
    (item) =>
      day.getDate() == item.date &&
      String(day.getMonth() + 1).padStart(2, "0") == item.month
  );
  cevent.sort(
    (a, b) =>
      new Date(`1970-01-01T${a.time}:00`) - new Date(`1970-01-01T${b.time}:00`)
  );
  cevent.forEach((item) => {
    let subitem = document.createElement("div");
    subitem.classList.add("subitem");
    subitem.textContent = item.time + " - " + item.name;
    let edit = document.createElement("a");
    edit.href = "editevent.php?id=" + item.id;
    edit.innerHTML = '<img src="../public/planner/icons/edit.svg">';
    edit.classList.add("icon", "icon-edit");
    let del = document.createElement("a");
    del.href = "../actions/deleteevent.php?id=" + item.id;
    del.innerHTML = '<img src="../public/planner/icons/delete.svg">';
    del.classList.add("icon", "icon-del");
    subitem.append(edit, del);
    div.appendChild(subitem);
    if (item.frequency == 2) {
      item.date = parseInt(item.date, 10) + 1;
    }
    if (item.frequency == 3) {
      item.date = parseInt(item.date, 10) + 7;
    }
  });
  let adding = document.createElement("a");

  adding.href =
    "createevent.php?date=" +
    day.getFullYear() +
    "-" +
    String(day.getMonth() + 1).padStart(2, "0") +
    "-" +
    String(day.getDate()).padStart(2, "0");
  adding.innerHTML = '<img src="../public/planner/icons/add.svg">';
  adding.classList.add("add_event");
  div.appendChild(adding);
  calendar.appendChild(div);
}

async function createCalendar(month, year) {
  calendar.innerHTML = "";
  let events = await fetchEvents();
  let weeks = await fetchWeeks();
  let psych = await fetchPsych();
  const today = new Date();
  const currentMonth = month;
  const currentYear = year;
  events = events.filter(
    (item) =>
      (item.year == currentYear && item.month == currentMonth + 1) ||
      item.month == currentMonth ||
      item.month == currentMonth + 2
  );
  weeks = weeks.filter(
    (item) =>
      item.year == currentYear && parseInt(item.month) == currentMonth + 1
  );
  psych = psych.find(
    (item) =>
      item.year == currentYear && parseInt(item.month) == currentMonth + 1
  );
  const firstDay = new Date(currentYear, currentMonth, 1);
  const lastDay = new Date(currentYear, currentMonth + 1, 0);

  if (lastDay.getDay() === 1 || lastDay.getDay() === 2) {
    lastDay.setDate(lastDay.getDate() - (lastDay.getDay() + 2));
  }
  let header = new Array(6);
  header[0] = document.createElement("div");
  calendar.appendChild(header[0]);
  for (let i = 1; i < 6; i++) {
    header[i] = document.createElement("div");
    calendar.appendChild(header[i]);
    header[i].classList.add("week_day");
    header[i].textContent = weekdays[i - 1];
  }
  let date = new Date(firstDay);
  if (date.getDay() >= 1 && date.getDay() <= 3) {
    let prevlast = new Date(currentYear, currentMonth, 0).getDate();
    let prevDate = new Date(
      currentYear,
      currentMonth - 1,
      prevlast - (date.getDay() - 2)
    );
    while (prevDate.getMonth() !== currentMonth) {
      if (prevDate.getDay() == 1) {
        startWeek(weeks);
      }
      createDay(prevDate, events, "not_current");
      prevDate.setDate(prevDate.getDate() + 1);
    }
  } else if (date.getDay() >= 4) {
    date.setDate(date.getDate() + (8 - date.getDay()));
  }

  while (date <= lastDay) {
    if (date.getDay() !== 0 && date.getDay() !== 6) {
      if (date.getDay() === 1) {
        startWeek(weeks);
      }
      createDay(date, events);
    }
    date.setDate(date.getDate() + 1);
  }
  if (lastDay.getDay() >= 3 && lastDay.getDay() <= 4) {
    let nextDate = new Date(currentYear, currentMonth + 1, 1);
    while (nextDate.getDay() !== 0 && nextDate.getDay() !== 6) {
      createDay(nextDate, events, "not_current");
      nextDate.setDate(nextDate.getDate() + 1);
    }
  }
  let psychology = document.createElement("div");
  psychology.textContent = " Психологічна служба";
  psychology.classList.add("week_name");
  calendar.appendChild(psychology);
  let psyc_content = document.createElement("div");
  psyc_content.classList.add("day", "psych_content");
  calendar.appendChild(psyc_content);

  calendar.appendChild(psyc_content);
  if (psych !== undefined) {
    psyc_content.textContent = psych.title;
    let edit = document.createElement("a");
    edit.href = "editpsych.php?id=" + psych.id;
    edit.innerHTML = '<img src="../public/planner/icons/edit.svg">';
    edit.classList.add("icon", "icon-edit");
    let del = document.createElement("a");
    del.href = "../actions/deletepsych.php?id=" + psych.id;
    del.innerHTML = '<img src="../public/planner/icons/delete.svg">';
    del.classList.add("icon", "icon-del");
    psyc_content.append(edit, del);
  } else {
    let adding = document.createElement("a");
    adding.href =
      "createpsyc.php?month=" +
      currentYear +
      "-" +
      String(currentMonth + 1).padStart(2, "0");
    adding.innerHTML = '<img src="../public/planner/icons/add.svg">';
    adding.classList.add("icon", "add_event");
    psyc_content.appendChild(adding);
  }
  let psych_dir = document.createElement("div");
  psych_dir.classList.add("day");
  psych_dir.textContent = "Практичний психолог";
  calendar.appendChild(psych_dir);
  document.getElementById("month_name").textContent = months[currentMonth];
  year_now.textContent = currentYear;
}

createCalendar(month_counter, year_counter);

const prevArrow = document.getElementById("prev");
const nextArrow = document.getElementById("next");

prevArrow.addEventListener("click", function () {
  if (month_counter == 0) {
    month_counter = 11;
    year_counter--;
    year_now.textContent = year_counter;
  } else {
    month_counter--;
  }
  i = 1;
  createCalendar(month_counter, year_counter);
});

nextArrow.addEventListener("click", function () {
  if (month_counter == 11) {
    month_counter = 0;
    year_counter++;
    year_now.textContent = year_counter;
  } else {
    month_counter++;
  }
  i = 1;
  createCalendar(month_counter, year_counter);
});
