// class Confirmation {
//     constructor(conteneur) {
//         this.conteneur = conteneur;
//         this.conteneur = document.querySelectorAll("confirmation");
//         this.message = "";
//     }
// }
//
// this.conteneur.addEventListener("click", this.message, (e) => {
//     if (!confirm(this.message)) {
//         e.preventDefault();
//         e.stopPropagation();
//
//     }
// })
//
// const confirmation1 = new Confirmation("confirmation");

function confirmDelete(e, message) {
    if (!confirm(message)) {
        e.preventDefault();
        e.stopPropagation();
    }
}

const mesBalises = document.querySelectorAll(".testJS");

for (i = 0; i < mesBalises.length; i++) {
    mesBalises[i].addEventListener("click", (e) => {
        let message = e.currentTarget.getAttribute("data-message"); //affiche le message contenu dans l'attribut message du lien
        if (!confirm(message)) {
            e.preventDefault();
            e.stopPropagation();
        }

    })

}