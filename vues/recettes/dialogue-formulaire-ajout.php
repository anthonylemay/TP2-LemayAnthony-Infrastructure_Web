<dialog id="dialogue-formulaire-ajout">
<h1>Ajouter une recette</h1>
    <form method="POST">
        <div>
          <div>
            <label for="nom_recette">Nom de la Recette *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="nom_recette" name="nom_recette" required maxlength="50">
          </div>
          <div>
            <label for="temps_cuisson_recette">Temps de cuisson *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="temps_cuisson_recette" name="temps_cuisson_recette" required maxlength="20">
          </div>
        </div>
        <div>
          <div>
            <?php
                      $controleurRecettes=new ControllerRecettes;
                      $controleurRecettes->afficherListeTypeRepas();
                  ?>
          </div>
        </div>

        <button name="boutonAjouter" type="submit">Ajouter le produit</button>
        <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
    </form>
</dialog>
    