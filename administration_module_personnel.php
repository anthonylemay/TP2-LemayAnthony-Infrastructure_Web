<?php
$title = 'Administration - Recettes';
include_once __DIR__ . '/views/header.php';
if (!isset($_SESSION["utilisateur"])) {
  header('Location: 404.php');

}

require_once __DIR__ . '/controllers/recette.php';

$controllerRecette = new ControllerRecette;


if (isset($_POST['boutonAjouter'])) {
  $controllerRecette->ajouter();
} else if (isset($_POST['boutonEditer'])) {
  $controllerRecette->editer();
} else if (isset($_POST['boutonSupprimer'])) {
  $controllerRecette->supprimer();
}
?>

<main>

  <h1>Administration - Recettes</h1>
  <?php
  $controllerRecette->adminToutesRecettes();

  ?>


</main>
<?php include_once __DIR__ . '/views/footer.php';
?>