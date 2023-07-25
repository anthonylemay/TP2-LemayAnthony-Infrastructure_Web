<div class="flex promoFlex">
        <div class="promoSlides">
        <div class="cardPromo">
            <div class="cardPromoInfo">
            <h1><?= $chalet->nom ?></h1>       
            <p><?= $chalet->description ?></p>
            <h4>De <?= $chalet->prix_basse_saison ?> $ à <?= $chalet->prix_haute_saison ?> $ / Nuit</h4>
            <h5>Jusqu'à <?= $chalet->personnes_max ?> chambreurs</h5>
            <a class="cardButton" href="#"><span>Planifiez votre séjour</span></a>
            <h6>En location depuis le <?= $chalet->date_inscription ?>.</h6>
            </div>    
            <img src="https://picsum.photos/id/<?=$chalet->id_picsum?>/500" alt="photo du chalet #<?= $chalet->id ?>">
            <div class="cardPromoGal">
            <img src="https://picsum.photos/150?random=1" alt="photo du chalet #<?= $chalet->id ?>">
            <img src="https://picsum.photos/150?random=2" alt="photo du chalet #<?= $chalet->id ?>">
            <img src="https://picsum.photos/150?random=3" alt="photo du chalet #<?= $chalet->id ?>">
            </div>  
        </div>
        </div>
</div>
