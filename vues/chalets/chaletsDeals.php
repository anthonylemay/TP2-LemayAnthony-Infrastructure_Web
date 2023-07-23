    <div class="flex">
    <h1>Chalets en promo</h1>
    <h2>Test</h2>
        <?php
            foreach ($chalets as $chalet) {
        ?>
        <div class="">
            <img src="https://picsum.photos/id/<?=$chalet->id_picsum?>/500" alt="photo du chalet #<?= $chalet->id ?>"> 
            <h2><?= $chalet->nom ?></h2>       
            <h3><?= $chalet->prix_basse_saison?></h3>    
            <a href="fiche_chalet.php?id=<?= $chalet->id ?>" target="_blank"><span>Pour en savoir plus</span></a>          
        </div>
        <?php
            }
        ?>
    </div>
