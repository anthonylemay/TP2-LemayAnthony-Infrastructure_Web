<h2>Gestion des repas</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>
        <th>Modifier</th>  
        <th>Supprimer</th>      
    </tr>

    <?php
        foreach ($repas as $plat) {
    ?>
        <tr>
            <td><?= $plat->id_recette ?></td>
            <td><?= $plat->type_repas ?></td>
            <td><?= $plat->nom_recette ?></td>
                        <!--lien pour modifier-->
            <!--lien pour modifier-->
        </tr>
    <?php
        }
    ?>
</table>