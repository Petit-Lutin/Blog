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