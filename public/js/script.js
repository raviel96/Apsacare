const scrollToTop = document.querySelector(".scroll-to-top");
const hamburgerBars =  document.querySelector(".fa-bars");
const mobileNav = document.querySelector(".main-nav");

window.addEventListener("scroll", () => {
    scrollToTop.classList.toggle("active", window.scrollY > 500);
});

scrollToTop.addEventListener("click", () => {
    window.scrollTo({
        top: 0
    });
})

hamburgerBars.addEventListener("click", () => {
    mobileNav.classList.toggle("showing");

    hamburgerBars.classList.toggle("fa-xmark");
    hamburgerBars.classList.toggle("fa-bars");

});

