<h2>Gestion des déjeuners</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>  
        <th>Gestion</th>   
    </tr>

    <?php
        foreach ($dejeuners as $dejeuner) {
    ?>
        <tr>
            <td><?= $dejeuner->id_recette ?></td>
            <td><?= $dejeuner->type_repas ?></td>
            <td><?= $dejeuner->nom_recette ?></td>
            <td>
            <button onclick="ouvrirDialogueEdition(<?= $dejeuner->id_recette ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $dejeuner->id_recette ?>)">Supprimer</button>
            </td>
        </tr>
    <?php
        }
    ?>
</table>