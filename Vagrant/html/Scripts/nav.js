const hamburger = document.querySelector(".hamburger");
const navbarbar = document.querySelector(".navbar-bar");

hamburger.addEventListener("click", ()=>{
    hamburger.classList.toggle("active");
    navbarbar.classList.toggle("active");
});