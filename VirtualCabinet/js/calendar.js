async function fetchEvents() {
  const response = await fetch("../../php/calendar.php");
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
  const response = await fetch("../../php/calendar.php");
  const data = await response.json();
  return data.weeks.map((week) => {
    return week;
  });
}

async function fetchPsych() {
  const response = await fetch("../../php/calendar.php");
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

function startWeek(name) {
  weekname = name.find((item) => item.week_number == i)?.title || "";
  let week = document.createElement("div");
  let p = document.createElement("p");
  p.textContent = counts[i] + " Тиждень";
  week.append(p);
  let p_2 = document.createElement("p");
  p_2.textContent = weekname;
  week.append(p_2);
  week.classList.add("week_name");
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
    div.appendChild(subitem);
    if (item.frequency == 2) {
      item.date = parseInt(item.date, 10) + 1;
    }
    if (item.frequency == 3) {
      item.date = parseInt(item.date, 10) + 7;
    }
  });
  calendar.appendChild(div);
}

async function createCalendar(month, year) {
  const events = await fetchEvents();
  const weeks = await fetchWeeks();
  const psych = await fetchPsych();
  const today = new Date();
  const currentMonth = month;
  const currentYear = year;

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
  if (psych.length != 0) {
    let psychology = document.createElement("div");
    psychology.textContent = " Психологічна служба";
    psychology.classList.add("week_name");
    calendar.appendChild(psychology);
    let psyc_content = document.createElement("div");
    psyc_content.textContent = psych[0].title;
    psyc_content.classList.add("day", "psych_content");
    calendar.appendChild(psyc_content);
    let psych_dir = document.createElement("div");
    psych_dir.classList.add("day");
    psych_dir.textContent = "Практичний психолог";
    calendar.appendChild(psych_dir);
  }

  document.getElementById("month_name").textContent = months[currentMonth];
}

createCalendar(today.getMonth(), today.getFullYear());
