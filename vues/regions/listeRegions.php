<div class="flex promoFlex">
        <div class="cardFlex">
        <?php
            foreach ($regions as $region) {
        ?>
        <div class="cardRegion">
            <img src="https://picsum.photos/id/20<?=$region->id?>/500" alt="photo de la region <?= $region->nom_region ?>"> <!--juste pour dire qu'il y a une photo sans avoir à mettre un id picsum-->
            <div class="cardRegionInfo">
            <h3><?= $region->nom_region ?></h3>       
            <h4>Découvrez tous nos chalets disponibles dans la région de <?= $region->nom_region ?></h3>    
            <a class="cardButton" href="liste_chalets_par_region.php?id=<?= $region->id ?>"><span>Explorer</span></a>
            </div>      
        </div>
        <?php
            }
        ?>
        </div>

</div>
