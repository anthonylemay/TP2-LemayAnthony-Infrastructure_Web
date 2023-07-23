    <div class="flex promoFlex">
    <h1>Nos Chalets en vedette</h1>
        <div class="promoCards">
        <?php
            foreach ($chalets as $chalet) {
        ?>
        <div class="cardPromo">
            <img src="https://picsum.photos/id/<?=$chalet->id_picsum?>/500" alt="photo du chalet #<?= $chalet->id ?>"> 
            <h3><?= $chalet->nom ?></h3>       
            <h4>À partir de <?= $chalet->prix_basse_saison?> $ / Nuit</h3>    
            <a class="cardButton" href="fiche_chalet.php?id=<?= $chalet->id ?>" target="_blank"><span>Fiche détaillée</span></a>          
        </div>
        <?php
            }
        ?>
        </div>
    </div>
