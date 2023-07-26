<dialog id="dialogue-formulaire-ajout">
  <h1>Ajouter une recette</h1>
  <form method="POST">
    <div>
      <div>
        <label for="nom_recette">Nom de la Recette *</label>
        <input type="text" id="nom_recette" name="nom_recette" required minlength="5" maxlength="50">
      </div>
      <div>
        <label for="temps_cuisson_recette">Temps de cuisson *</label>
        <input type="text" id="temps_cuisson_recette" name="temps_cuisson_recette" required minlength="2"
          maxlength="20">
      </div>
    </div>
    <div>
      <div>
        <?php
        $controleurRecettes = new ControllerRecettes;
        $controleurRecettes->afficherListeTypeRepasAjout();
        ?>
      </div>
    </div>

    <button name="boutonAjouter" type="submit">Ajouter la recette</button>
    <button type="button" onclick="this.closest('dialog').close()">Annuler</button>
  </form>
</dialog>