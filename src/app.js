const translate = document.querySelectorAll(".translate");
const header = document.querySelector("header");
const hamilton = document.querySelector(".hamilton");
const massa = document.querySelector(".massa");
const shadow = document.querySelector(".shadow");
const content = document.querySelector(".content");
const section = document.querySelector("section");
const image_container = document.querySelector(".imgContainer");
const opacity = document.querySelectorAll(".opacity");
const border = document.querySelector(".border");

let header_height = header.offsetHeight;
let section_height = section.offsetHeight;

window.addEventListener('scroll', () => {
    let scroll = window.pageYOffset;
    let sectionY = section.getBoundingClientRect();
    // mozgatás headerben
    translate.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translateY(${scroll * speed}px)`;
    });

    //pilóták halványítása headerben
    hamilton.style.opacity = - scroll / (header_height / 2) + 1;
    massa.style.opacity = - scroll / (header_height / 2) + 1;

     //Header alatti tartalom megjelenítése
    opacity.forEach(element => {
        element.style.opacity = scroll / (sectionY.top + section_height);
    })
    shadow.style.height = `${scroll * 0.5 + 300}px`;
    content.style.transform = `translateY(${scroll / (section_height + sectionY.top) * 50 - 50}px)`;
    image_container.style.transform = `translateY(${scroll / (section_height + sectionY.top) * -50 + 50}px)`;

    border.style.width = `${scroll / (sectionY.top + section_height) * 30}%`;
})

const menuToggle = document.querySelector('.hamburger-menu');
const menu = document.querySelector('.menu');

menuToggle.addEventListener('click', () => {
    menu.classList.toggle('show');
    menuToggle.classList.toggle('active');
});