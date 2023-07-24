<h2>Gestion des déjeuners</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>  
        <th>Modifications</th>  
        <th>Supprimer</th>    
    </tr>

    <?php
        foreach ($dejeuners as $dejeuner) {
    ?>
        <tr>
            <td><?= $dejeuner->id_recette ?></td>
            <td><?= $dejeuner->type_repas ?></td>
            <td><?= $dejeuner->nom_recette ?></td>
            <!--lien pour modifier-->
            <!--lien pour modifier-->
        </tr>
    <?php
        }
    ?>
</table>