const scrollToTop = document.querySelector(".scroll-to-top");
const hamburgerBars =  document.querySelector(".fa-bars");
const mobileNav = document.querySelector(".main-nav");
const readMore = document.querySelectorAll(".read-more");

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

for(let i = 0; i < readMore.length; i++ ) {
    readMore[i].addEventListener("click", () => {
        readMore[i].parentNode.classList.toggle("active");
    }); 
}

