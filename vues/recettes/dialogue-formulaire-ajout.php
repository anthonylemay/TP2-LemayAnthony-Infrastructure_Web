<dialog id="dialogue-formulaire-ajout">
    <form method="POST">
        <div>
          <div>
            <label for="nom_recette">Nom de la Recette *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="nom_recette" name="nom_recette" required maxlength="50">
          </div>
          <div>
            <label for="ajout_id_recette">ID de la recette *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="number" step="1" id="ajout_id_recette" name="id_recette" required max="9999">
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
    