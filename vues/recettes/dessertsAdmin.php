<h2>Gestion des desserts</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>
        <th>Modifier</th>  
        <th>Supprimer</th>      
    </tr>

    <?php
        foreach ($desserts as $dessert) {
    ?>
        <tr>
            <td><?= $dessert->id_recette ?></td>
            <td><?= $dessert->type_repas ?></td>
            <td><?= $dessert->nom_recette ?></td>
                        <!--lien pour modifier-->
            <!--lien pour modifier-->
        </tr>
    <?php
        }
    ?>

</table>