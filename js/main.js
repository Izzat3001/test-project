const headerNav = document.querySelector('.header__nav');
const navIcon = document.querySelector('.nav-icon');
const headerTopNav = document.querySelector('.header__top-nav');

const navLinks = document.querySelectorAll('.header__top-nav a');
console.log("link", navLinks)

// modal-window
const button = document.querySelector(".button");
const modal = document.querySelector(".modal");
const modalClosed = document.querySelector(".modal__closed");

button.addEventListener('click', () => {
    console.log("CLICK...!!!");
    modal.classList.add("modal--open");
    modalClosed.addEventListener('click', () => {
        modal.classList.remove("modal--open");
    })
});

headerNav.addEventListener('click', () => {
    navIcon.classList.toggle('active');
    headerTopNav.classList.toggle('nav--active');
});

navLinks.forEach((item) => {
    item.addEventListener('click', () => {
        navIcon.classList.remove('active');
        headerTopNav.classList.remove('nav--active');
    })
});

