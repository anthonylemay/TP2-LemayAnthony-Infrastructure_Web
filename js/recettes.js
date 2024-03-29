function ouvrirDialogueConnexion() {
    //console.log('ouvrirDialogueConnexion function has been called'); 
    var dialogue = document.getElementById("dialog_login");
    console.log('dialogue element:', dialogue);
    dialogue.showModal();
}

function ouvrirDialogueAjout() {
    //console.log('appel de la méthode ouvrirDialogueAjout'); 
    dialogue = document.getElementById("dialogue-formulaire-ajout");
    dialogue.showModal();
}

function ouvrirDialogueEdition(id) {
    //console.log('appel de la méthode ouvrirDialogueEdition'); 
    //console.log(id);
    dialogue = document.getElementById("dialogue-formulaire-edition");
    const recette = getRecette(id).then(recette => {
        console.log(recette);
        if (recette) {
            document.getElementById("dialogue-formulaire-edition-nom_recette").value = recette.nom_recette;
            document.getElementById("dialogue-formulaire-edition-id").value = recette.id_recette;
            document.getElementById("dialogue-formulaire-edition-temps_cuisson_recette").value = recette.temps_cuisson_recette;
            document.getElementById("dialogue-formulaire-edition-type_repas").value = recette.id_type;

            dialogue.showModal();
        }
    });
}

function ouvrirDialogueSuppression(id) {
    //console.log('appel de la méthode ouvrirDialogueSuppression');
    //console.log(id);
    dialogue = document.getElementById("dialogue-formulaire-suppression");
    
    const recette = getRecette(id).then(recette => {
        console.log(recette);
        if (recette) {
            document.getElementById("dialogue-suppression-nom").textContent = recette.nom_recette;
            document.getElementById("dialogue-formulaire-suppression-id").value = recette.id_recette;
            dialogue.showModal();
        }
    });
}


async function getRecette(id) {
    let response = await fetch('api/recettes/?id=' + id);
        
    if (response.ok) {
        //console.log('Recette:', response);
        return await response.json();
    } else {
        alert("Il y a eu un problème avec l'opération fetch. Voir la console pour plus de détails ");
        //console.log(await response.json());
    }
}