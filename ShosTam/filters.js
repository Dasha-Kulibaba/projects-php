const filter = document.querySelector(".type");
const filtervars = document.querySelector(".type-variants");
const filterarrow = document.getElementById("type-arrow");

const source = document.querySelector('.source');
const sourcevars = document.querySelector('.source-variants');
const sourcearrow = document.getElementById("source-arrow");

filter.addEventListener("click", function () {
    filtervars.classList.toggle("open-var");
    filterarrow.classList.toggle("rotate180");
    if (sourcevars.classList.contains("open-var")) sourcevars.classList.remove("open-var");
})

source.addEventListener("click", function () {
    sourcevars.classList.toggle("open-var");
    sourcearrow.classList.toggle("rotate180");
    if (filtervars.classList.contains("open-var")) filtervars.classList.remove("open-var");
})