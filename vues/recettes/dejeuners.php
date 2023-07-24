<h2>Il n'y a pas d'heures pour déjeuner au chalet!</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>    
    </tr>

    <?php
        foreach ($dejeuners as $dejeuner) {
    ?>
        <tr>
            <td><?= $dejeuner->id_recette ?></td>
            <td><?= $dejeuner->type_repas ?></td>
            <td><?= $dejeuner->nom_recette ?></td>
        </tr>
    <?php
        }
    ?>
</table>