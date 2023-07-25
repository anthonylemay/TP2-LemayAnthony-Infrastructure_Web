<div class="flex promoFlex">
        <div class="promoSlides">
        <?php
            foreach ($chalets as $chalet) {
        ?>
        <div class="cardPromo">
            <img src="https://picsum.photos/id/<?=$chalet->id_picsum?>/500" alt="photo du chalet #<?= $chalet->id ?>">
            <div class="cardPromoInfo">
            <div class="cardPromoGal">
            <img src="https://picsum.photos/150?random=1" alt="photo du chalet #<?= $chalet->id ?>">
            <img src="https://picsum.photos/150?random=2" alt="photo du chalet #<?= $chalet->id ?>">
            <img src="https://picsum.photos/150?random=3" alt="photo du chalet #<?= $chalet->id ?>">
            </div>
            <h3><?= $chalet->nom ?></h3>       
            <h4>À partir de <?= $chalet->prix_basse_saison?> $ / Nuit</h3>    
            <a class="cardButton" href="fiche_chalet.php?id=<?= $chalet->id ?>"><span>Pour en savoir plus</span></a>
            </div>      
        </div>
        <?php
            }
        ?>
        </div>
</div>
