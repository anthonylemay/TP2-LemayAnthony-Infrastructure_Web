<dialog id="dialogue-formulaire-edition">
  <h1>Éditer une recette</h1>
  <form method="POST">
    <div>
      <div>
        <label for="nom_recette">Nom de la Recette *</label>
        <input type="text" id="dialogue-formulaire-edition-nom_recette" name="nom_recette" required minlength="5"
          maxlength="50">
      </div>
      <div>
        <label for="temps_cuisson_recette">Temps de cuisson *</label>
        <input type="text" id="dialogue-formulaire-edition-temps_cuisson_recette" name="temps_cuisson_recette" required
          minlength="2" maxlength="20">
      </div>

    </div>
    <div>
      <div>
        <?php
        $controleurRecettes = new ControllerRecettes;
        $controleurRecettes->afficherListeTypeRepasEdit();
        ?>
      </div>
    </div>

    <button name="boutonEditer" type="submit">Modifier la recette</button>
    <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
    <input type="hidden" id="dialogue-formulaire-edition-id" name="id_recette" value="">

  </form>
</dialog>