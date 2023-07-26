<h2>Pour dîner et souper, nonplus!</h2>
<table class="table">
    <tr>
        <th>#</th>
        <th>Type</th>
        <th>Recette</th>
        <th>Temps de cuisson</th>
    </tr>

    <?php
    foreach ($repas as $plat) {
        ?>
        <tr>
            <td>
                <?= $plat->id_recette ?>
            </td>
            <td>
                <?= $plat->type_repas ?>
            </td>
            <td>
                <?= $plat->nom_recette ?>
            </td>
            <td>
                <?= $plat->temps_cuisson_recette ?>
            </td>

        </tr>
        <?php
    }
    ?>
</table>