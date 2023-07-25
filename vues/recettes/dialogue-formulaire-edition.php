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
          <label for="temps_cuisson_recette">Temps de cuisson *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="text" id="dialogue-formulaire-edition-temps_cuisson_recette" name="temps_cuisson_recette" required maxlength="20">
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
        <input type="hidden" id="dialogue-formulaire-edition-id" name="id_recette" value="">

    </form>                         
</dialog>