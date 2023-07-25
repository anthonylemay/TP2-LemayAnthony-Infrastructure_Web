<h2>Gestion des desserts</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>
        <th>Gestion</th>     
    </tr>

    <?php
        foreach ($desserts as $dessert) {
    ?>
        <tr>
            <td><?= $dessert->id_recette ?></td>
            <td><?= $dessert->type_repas ?></td>
            <td><?= $dessert->nom_recette ?></td>
            <td>
            <button onclick="ouvrirDialogueEdition(<?= $dessert->id_recette ?>)">Modifier</button>
                <button onclick="ouvrirDialogueSuppression(<?= $dessert->id_recette ?>)">Supprimer</button>
            </td>
        </tr>
    <?php
        }
    ?>

</table>