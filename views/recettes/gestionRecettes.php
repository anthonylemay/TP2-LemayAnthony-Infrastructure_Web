<h2>Gestion des recettes</h2>
<button onclick="ouvrirDialogueAjout()">Ajouter une Recette</button>
<table class="table">
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Recette</th>
        <th>Temps de cuisson</th>
        <th>Gestion</th>
    </tr>

    <?php
    foreach ($recettes as $recette) {
        ?>
        <tr>
            <td>
                <?= $recette->id_recette ?>
            </td>
            <td>
                <?= $recette->id_type ?>
            </td>
            <td>
                <?= $recette->nom_recette ?>
            </td>
            <td>
                <?= $recette->temps_cuisson_recette ?>
            </td>
            <td>
                <button onclick="ouvrirDialogueEdition(<?= $recette->id_recette ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $recette->id_recette ?>)">Supprimer</button>
            </td>
        </tr>
        <?php
    }
    ?>
</table>