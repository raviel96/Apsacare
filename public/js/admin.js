
// Admin tab const
const tabContainer = document.querySelector(".tabs-container");
const tabsList = document.querySelector(".tab-list");
const tabButtons= tabsList.querySelectorAll("a");
const tabPanels = document.querySelectorAll(".tab-panels > div");

const courses = fetchAll("courses");
const categories = fetchAll("categories");

tabButtons.forEach((tab, index) => {
    if(index === 0) {
    
    } else {
        tabPanels[index].setAttribute("hidden", "");
    }
});

tabContainer.addEventListener("click", (event) => {
    const clickedTab = event.target.closest("a");
    if(!clickedTab) return;
    
    const activePaneId = clickedTab.getAttribute("href");
    const activePane = tabContainer.querySelector(activePaneId);

    tabPanels.forEach((panel) => {
        panel.setAttribute("hidden", true);
    });

    activePane.removeAttribute("hidden", false);

});

window.addEventListener('hashchange', function(){
    let position = location.href.search("#");

    if(position != -1) {
        const activePaneId = location.href.substring(location.href.length, position);
        const activePane = tabContainer.querySelector(activePaneId);

        tabPanels.forEach((panel) => {
            panel.setAttribute("hidden", true);
        });
    
        activePane.removeAttribute("hidden", false);
    }

});

//Modals

const modalButtons = document.querySelectorAll("[data-modal-target]");
const closeButtons = document.querySelectorAll("[data-close-button]");
const overlay = document.querySelector(".overlay");

const deleteButtons = document.querySelectorAll("[data-delete-button]");

modalButtons.forEach(button => {
    button.addEventListener("click", () => {
        const modal = document.querySelector(button.dataset.modalTarget);

        openModal(modal, button);
    });
});

closeButtons.forEach(button => {
    button.addEventListener("click", () => {
        const modal = button.closest(".modal");
        
        closeModal(modal);
    });
});

overlay.addEventListener("click", () => {
    const modals = document.querySelectorAll(".modal.active");

    modals.forEach(modal => {
        closeModal(modal);
    });
});

function openModal(modal, button) {
    if(modal == null) return;

    const course = fetchOne("course", button.dataset.course);

    modal.classList.add("active");
    overlay.classList.add("active");

    switch(modal.getAttribute("id")) {
        case "edit-course-modal": {
                const editForm = modal.querySelector(".edit-form");
                
                course.then(data => {
                    handleEditModal(editForm, data);
                });
            }

            break;
            case "delete-course-modal": {
                const modalDeleteButton = modal.querySelector(".modal-delete-button");
                

                modalDeleteButton.addEventListener("click", () => {
                    course.then(data => {
                        handleDeleteModal(data);
                        closeModal(modal);
                    });
                }); 
            }
        default:
            break;
    }

}

function closeModal(modal) {
    if(modal == null) return;

    modal.classList.remove("active");
    overlay.classList.remove("active");
}

function handleEditModal(editForm, course) {

    categories.then(data => {
        let options = ``;

        data.forEach(category => {

            if(category["id"] == course["categoryId"]) {
                options = options + `<option value="${category["id"]}" selected>${category["name"]}</option>`;
            } else {
                options = options + `<option value="${category["id"]}">${category["name"]}</option>`;
            }

        });

        let content = `
            <div class="form-container">
                <input type="hidden" name="id" value="${course["id"]}">
                <div class="form-group grid-span-2">
                    <label for="title">Intitulé</label>
                    <input type="text" name="title" id="title" value="${course["title"]}">
                </div>
                <div class="form-group category grid-span-2">
                    <label for="categoryId">Catégorie</label>
                    <select class="form-control" name="categoryId" id="categoryId">
                        <option value="">Catégorie</option>` 
                       +options+
                    `</select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" name="description" placeholder="Description...">${course["description"]}</textarea>
                </div>
                <div class="form-group">
                    <label for="acquired">Prérequis</label>
                    <textarea class="form-control" name="acquired" placeholder="Prérequis...">${course["acquired"]}</textarea>
                </div>
                <div class="form-group">
                    <label for="objective">Objectifs</label>
                    <textarea class="form-control" name="objective" placeholder="Objectifs...">${course["objective"]}</textarea>
                </div>
                <div class="form-group">
                    <label for="program">Programme</label>
                    <textarea class="form-control" name="program" placeholder="Programme...">${course["program"]}</textarea>
                </div>
                <div class="form-group">
                    <label for="duration">Durée</label>
                    <input class="form-control" type="text" name="duration" id="duration" value="${course["duration"]}">
                </div>
                <div class="form-group">
                    <label for="pdf">PDF</label>
                    <input class="form-control" type="text" name="pdf" id="pdf" value="${course["pdf"]}">
                </div>
            </div>
            <div class="submit-form">
                <input class="btn-primary" type="submit" value="Editer">
            </div>
        `;

        editForm.innerHTML = content;
    });
}

function handleDeleteModal(data) {

    send(data, "course", "delete", data["id"]);

}

function fetchAll(data) {

    let url = `/api/${data}`;

    return fetch(url, {
                method: "GET",
            })
            .then((response) => {
                return response.json();
            })
            .catch((error) => {
                 throw error;
    });

}

function fetchOne(data, id) {

    let url = `/api/${data}?id=${id}`;

    return fetch(url, {
                method: "GET",
            })
            .then((response) => {
                return response.json();
            })
            .catch((error) => {
                 throw error;
    });

}

function send(toSend, dataName, action, id) {
    fetch(`/portal/admin/${dataName}/${action}?id=${id}`, {
        method:"POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: toSend
    }).then((response) => {
        return response.status;
    }).catch((error) => {
        throw error;
    });

}