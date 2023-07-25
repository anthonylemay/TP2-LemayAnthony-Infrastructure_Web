<dialog id="dialogue-formulaire-suppression">
  <div>
    <div>
      Voulez-vous vraiment supprimer cette recette?
      <h3><span id="dialogue-suppression-nom"></span></h3>
    </div>
  </div>

  <form method="POST">
      <button name="boutonSupprimer" type="submit">Supprimer la recette</button>
      <button type="button" onclick="this.closest('dialog').close()">Annuler</button>      
      <input type="hidden" id="dialogue-formulaire-suppression-id" name="id" value="">
  </form>
</dialog>