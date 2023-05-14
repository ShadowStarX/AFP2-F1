const translate = document.querySelectorAll(".translate");
const header = document.querySelector("header");
const hamilton = document.querySelector(".hamilton");
const massa = document.querySelector(".massa");

let header_height = header.offsetHeight;

window.addEventListener('scroll', () => {
    let scroll = window.pageYOffset;
    translate.forEach(element => {
        let speed = element.dataset.speed;
        element.style.transform = `translateY(${scroll * speed}px)`;      
    })
    hamilton.style.opacity = - scroll / (header_height / 2) + 1;
    massa.style.opacity = - scroll / (header_height / 2) + 1;
})