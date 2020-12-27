//mobile navbar slide open with hamBtn
const hamBtn = document.getElementById("hamBtn");
const navNarMb = document.querySelector(".nav-bar__menu-wrap-mb");

const openNavBarMb = function () {
  navNarMb.style.left = "0";
  navNarMb.style.transition = ".5s";
};

hamBtn.addEventListener("click", openNavBarMb);

//mobile navbar slide close with closeBtn
const closeBtn = document.getElementById("closeBtn");

const closeNavBarMb = function () {
  navNarMb.style.left = "-70vw";
};

closeBtn.addEventListener("click", closeNavBarMb);
