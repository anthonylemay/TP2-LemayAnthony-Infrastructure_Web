<?php
session_start();
// require_once __DIR__ . '/../controllers/test.php'; // DEBUG pour regarder si le lien entre models / config fonctionne.

require_once __DIR__ . '/../controllers/region.php';
require_once __DIR__ . '/../controllers/authentification.php';
$menuControllerRegion = new ControllerRegion();
$controllerAuthentification = new ControllerAuthentification;
if (isset($_POST['connexionSubmit'])) {
  $controllerAuthentification->connecter();
} else if (isset($_POST['deconnexionSubmit'])) {
  $controllerAuthentification->deconnecter();
}

?>

<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>
    <?= $title ?>
  </title>

  <link rel="stylesheet" href="css/styles.css">
  <script src="js/recettes.js" defer></script>
</head>

<body class="light-mode">
  <!-- Navigation -->
  <header>
    <nav class="containerMenu">
      <img src="https://picsum.photos/id/13/80" alt="logo">
      <ul>
        <li><a href="index.php">Accueil</a></li>
        <li><a href="liste_chalets.php">Chalets à louer</a></li>
        <li>
          <a href="liste_chalets_par_region.php">Chalets par région &nbsp;<i class="arrow down"></i></a>
          <ul>
            <?php echo $menuControllerRegion->afficherMenuRegions(); ?>
          </ul>
        </li>
        <li><a href="liste_chalets_en_promotion.php">Chalets en promotion</a></li>
        <li><a href="recettes.php">Recettes à partager</a></li>
        <?php
        if (isset($_SESSION["utilisateur"])) {
          ?>
          <li>
            <a href="administration_chalets.php">Administration &nbsp;<i class="arrow down"></i></a>
            <ul>
              <li><a href="administration_chalets.php">Chalets</a></li>
              <li><a href="administration_module_personnel.php">Recettes</a></li>
            </ul>
          </li>
          <?php
        }
        ?>
        <!-- Formulaire de connexion -->
        <?php if (!isset($_SESSION["utilisateur"])) {
          ?>
          <button id="loginBtn" onclick="ouvrirDialogueConnexion()">Connexion</button>
          <?php
        } else {
          ?>
          <li class="loginFlex">
            <span class="navbar-text">Bonjour,
              <?php echo $_SESSION['utilisateur']; ?>
            </span>
            <form method="post">
              <button id="logoutBtn" type="submit" name="deconnexionSubmit"
                class="btn btn-sm btn-outline-primary">Déconnexion</button>
            </form>
          </li>
        <?php
        }
        ?>
      </ul>
    </nav>
    <hr>
  </header>
  <div class="container"> <!-- container qui se ferme dans le footer après le main -->