const RULE_REQUIRED = "required";
const RULE_PHONE = "phone";
const RULE_EMAIL = "email";
const RULE_NAME = "name";

// Variable objects for form validation
let errors = {};

let errorMessages = {
    required: "Champ obligatoire",
    phone: "Veuillez saisir un numéro valide",
    email: "Veuillez saisir une adresse e-mail valide",
    name: "Le {name} spécifié est incorrect"
};

let rules = {
    lastname: [RULE_REQUIRED, RULE_NAME], 
    firstname: [RULE_REQUIRED, RULE_NAME], 
    email: [RULE_EMAIL], 
    phone: [RULE_REQUIRED, RULE_PHONE], 
    legal: [RULE_REQUIRED]
};

const currentLocation = location.href;

const scrollToTop = document.querySelector(".scroll-to-top");

// Nav const
const headerSticky = document.querySelector(".header-sticky");
const hamburgerBars =  document.querySelector(".fa-bars");
const mobileNav = document.querySelector(".main-nav");

// Links and buttons const
const readMoreButtons = document.querySelectorAll(".read-more");
const navigationLinks = document.querySelectorAll(".main-nav a");

// Contact form const
const contactForm = document.querySelector("#contact-form");
const lastname = document.querySelector("#lastname");
const firstname = document.querySelector("#firstname");
const email = document.querySelector("#email");
const phone = document.querySelector("#phone");
const legal = document.querySelector("#legal");

let inputList = [
    lastname,
    firstname,
    email,
    phone,
    legal
];

//  Other const
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
});


// Contact form validation
contactForm.addEventListener("submit", (event) => {
    event.preventDefault();

    if(!validate()) {
        inputList.forEach(input => {

            let errorMessage = getFirstError(input);
            let span = input.closest(".form-group").querySelector(".invalid-feedback");

            if(hasError(input)) {
                input.classList.add("is-invalid");
            } else {

                if(input.classList.contains("is-invalid")) {
                    // Remove class
                    input.classList.remove("is-invalid");
                }
            }

            // Add error message
            span.innerHTML = errorMessage;
            
        });

        return false;
    }
});

function validate() {
    errors = [];

    // Iterate over field array and check if the field is empty. 
    // If yes, add error to the error array
    
    for(let key in rules) {
        
        let value;

        inputList.forEach(input => {

            if(input.name === key) {
                value = input.value;

                if(input.type === "checkbox") {
                    value = input.checked;
                }
            }
            
        });
        

        rules[key].forEach(rule => {

            switch(rule) {
                case  RULE_REQUIRED: 
    
                    if(!value) {
                        // Si on n'a pas de valeur, alors on ajoute une erreur de la règle "required"
                        addErrorForRule(key, rule);
                    } 
    
                    break;
                case RULE_NAME:
                    if(value) {

                        let validRegex = /^[A-Z-\p{L}]+$/i;

                        // On regarde si l'utilisateur a inscrit un nom ou prénom avec plus de 2 caractères
                        if(value.length < 3) {
                            addErrorForRule(key, rule);
                        }

                        // On vérifié que le nom ou prénom ne contient que des caractères alphabétiques
                        if(!isValid(validRegex, value)) {
                            addErrorForRule(key, rule);
                        }
                    }

                    break;
                case RULE_PHONE:

                    if(value) {

                        let validRegex = /^([\d\s\+\-]{10,20})+$/;
                        
                        // On vérifie que c'est un numéro correct
                        if(!isValid(validRegex, value)) {
                            addErrorForRule(key, rule);
                        }
                    }

                    break;
                case RULE_EMAIL: 

                    if(value) {

                        let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
                        
                        //  On vérifie que l'email est valide
                        if(!isValid(validRegex, value)) {
                            addErrorForRule(key, rule);
                        }
                    }

                    break;
                default:
                    break;
            }

        });
    
    }

    // Si le tableau contient des erreurs, alors on retourne false. Le formulaire n'est donc pas validé
    return Object.keys(errors).length === 0 ? true : false;
}

/**
 * 
 * @param input The input field
 * @param rule The rule that trigged
 */
function addErrorForRule(input, rule) {
    let message = errorMessages[rule];

    switch(input) {
        case "lastname":
            message = message.replace("{name}", "nom"); 
            break;
        case "firstname":
            message = message.replace("{name}", "prénom");
            break;
        default:
            break;
    }

    errors[input] = message;
}

function isValid(regex, value) {
    return regex.test(value);
}

function hasError(input) {
    return errors[input.name] ? true : false;
}

/**
 * 
 * @param input The input field
 * @returns 
 */
function getFirstError(input) {
    return errors[input.name] ?? "";
}

