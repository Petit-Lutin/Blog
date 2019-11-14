const mesBalises = document.querySelectorAll(".toConfirm");

for (i = 0; i < mesBalises.length; i++) {
    mesBalises[i].addEventListener("click", (e) => {
        let message = e.currentTarget.getAttribute("data-message"); //affiche le message contenu dans l'attribut message du lien
        if (!confirm(message)) {
            e.preventDefault();
            e.stopPropagation();
        }
    })
}