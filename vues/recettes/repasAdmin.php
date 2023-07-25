<h2>Gestion des repas</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>
        <th>Gestion</th>      
    </tr>

    <?php
        foreach ($repas as $plat) {
    ?>
        <tr>
            <td><?= $plat->id_recette ?></td>
            <td><?= $plat->type_repas ?></td>
            <td><?= $plat->nom_recette ?></td>
            <td>
                <button onclick="ouvrirDialogueEdition(<?= $plat->id_recette ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $plat->id_recette ?>)">Supprimer</button>
            </td>
        </tr>
    <?php
        }
    ?>
</table>