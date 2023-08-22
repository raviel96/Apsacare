const currentLocation = location.href;

const scrollToTop = document.querySelector(".scroll-to-top");
const headerSticky = document.querySelector(".header-sticky");
const hamburgerBars =  document.querySelector(".fa-bars");
const mobileNav = document.querySelector(".main-nav");
const readMoreButtons = document.querySelectorAll(".read-more");
const navigationLinks = document.querySelectorAll(".main-nav a");

const sliders = document.querySelectorAll(".slide-in");

const observerOptions = {
    threshold: 0,
    rootMargin: "0px 0px -100px 0px"
};

const appearOnScroll = new IntersectionObserver((entries, appearOnScroll) => {
    entries.forEach(entry => {
        if(!entry.isIntersecting) {
            return;
        }

        entry.target.classList.add("appear");
        appearOnScroll.unobserve(entry.target);
    });
}, observerOptions); 


window.addEventListener("scroll", () => {
    scrollToTop.classList.toggle("active", window.scrollY > 500);
    headerSticky.classList.toggle("fixed", window.scrollY > 110);
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

readMoreButtons.forEach((button) => {
    button.addEventListener("click", () => {
        button.parentNode.classList.toggle("active");
    }); 
});

navigationLinks.forEach((link) => {
    let position = currentLocation.search("#");

    if(position != -1) {
        if(link.href === currentLocation.substring(0, position)) {
            link.classList.toggle("current");
        }
    }

    if(link.href === currentLocation) {
        link.classList.toggle("current");
    }
});





sliders.forEach((slider) => {
    appearOnScroll.observe(slider);
})
