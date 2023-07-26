<ul>
    <?php
    foreach ($regions as $region) {
        ?>
        <li>
            <a href="liste_chalets_par_region.php?id=<?= $region->id ?>"><span>
                    <?= $region->nom_region ?>
                </span></a>
        </li>
        <?php
    }
    ?>
</ul>