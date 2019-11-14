const validation = document.querySelectorAll(".formWithSlug");

for (i = 0; i < validation.length; i++) {
    const title = document.querySelectorAll(".title");
    const slug = document.querySelectorAll(".slug");


   validation[i].addEventListener("click", (e) => {
        e.preventDefault();
        e.stopPropagation();

        let message = "";
        //On vérifie avec une expression régulière que le slug est composé de lettres ou de chiffres et de tirets, sans espace ni accent
        var regex = /^[a-z0-9\-]{2,}$/

        if (title.trim().length === 0) message += "Le titre de l'article doit être complété.\r\n";
        if ((slug.trim().length === 0) || !(regex.test(slug.value))){
            message += "L'URL personnalisée ne doit contenir que des lettres sans accent. Pour séparer les mots, vous pouver utiliser des tirets. Exemple d'URL personnalisée valide 'chapitre-4'.\r\n";
        }
        if (message.length > 0) {
            alert(message);
        }

    })
}