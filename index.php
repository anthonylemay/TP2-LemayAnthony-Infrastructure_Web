<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$title = 'Accueil - Chalets';
include_once __DIR__ . '/vues/header.php';
include_once __DIR__ . '/controllers/chalet.php';

/* require_once __DIR__ . '/include/config.php';
$db1 = Db::connecterDB_1();
$db2 = Db::connecterDB_2();  *//*DEBUG LIEN BASE DE DONNÉE SI CA MARCHE*/
$controllerChalets = new ControllerChalets();

?>

<main>
  <div class="flexAccueil">
    <h1>Promotion des vacances de la construction!</h1>
    <div class="flex">
      <!-- Chalets sous forme de cartes -->
      <!-- Affiche 6 chalets ACTIFS et en PROMOTION en ordre aléatoire. Indice : https://www.mysqltutorial.org/select-random-records-database-table.aspx  -->
      <?php
      $controllerChalets->afficherDealFlash();
      ?>
    </div>
    <a class="lienAccueil" href="liste_chalets_en_promotion.php"><span>Voir toutes nos promotions</span></a>
    <h2>Autres coups de coeurs</h2>
    <div class="flex">

      <div class="card">
        <img src="https://picsum.photos/id/380/500" alt="Chalet #1">
        <div class="cardcontainer">
          <h4>Chalet #1</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=1">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/10/500" alt="Chalet #9"> <!-- car #2 est inactif.. -->
        <div class="cardcontainer">
          <h4>Chalet #2</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=2">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/13/500" alt="Chalet #3">
        <div class="cardcontainer">
          <h4>Chalet #3</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=3">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/14/500" alt="Chalet #4">
        <div class="cardcontainer">
          <h4>Chalet #4</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=4">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/17/500" alt="Chalet #5">
        <div class="cardcontainer">
          <h4>Chalet #5</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=5">Pour en savoir plus</a>
        </div>
      </div>

      <div class="card">
        <img src="https://picsum.photos/id/28/500" alt="Chalet #6">
        <div class="cardcontainer">
          <h4>Chalet #6</h4>
          <span>à partir de 0,00 $</span>
          <a href="http://localhost/infrastructure_web_projet_final_2023/fiche_chalet.php?id=6">Pour en savoir plus</a>
        </div>
      </div>
    </div>
    <a class="lienAccueil" href="liste_chalets.php"><span>Voir tous les chalets</span></a>
  </div>
</main>

<?php include_once __DIR__ . '/vues/footer.php'; ?>