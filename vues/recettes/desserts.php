<h2>Et pour couronner le tout, un petit dessert!</h2>
<table class="table">
    <tr>
        <th>#</th>  
        <th>Type</th>       
        <th>Recette</th>    
    </tr>

    <?php
        foreach ($desserts as $dessert) {
    ?>
        <tr>
            <td><?= $dessert->id_recette ?></td>
            <td><?= $dessert->type_repas ?></td>
            <td><?= $dessert->nom_recette ?></td>
            
        </tr>
    <?php
        }
    ?>

</table>