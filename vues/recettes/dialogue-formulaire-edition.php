<dialog id="dialogue-formulaire-edition">
    <h1>Éditer une recette</h1>
    <form method="POST">
    <div>
          <div>
            <label for="nom_recette">Nom de la Recette *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="dialogue-formulaire-edition-nom_recette" name="nom_recette" required maxlength="50">
          </div>
          <div>
            <label for="id_recette">ID de la recette *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step="1" id="dialogue-formulaire-edition-id_recette" name="id_recette" required max="9999">
          </div>
    </div>
        <div>
          <div>
          <?php
                      $controleurRecettes=new ControllerRecettes;
                      $controleurRecettes->afficherListeTypeRepasEdit();
                  ?>
          </div>
        </div>

        <button name="boutonEditer" type="submit">Modifier le produit</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
        <input type="hidden" id="dialogue-formulaire-edition-id" name="id" value="">
    </form>                         
</dialog>