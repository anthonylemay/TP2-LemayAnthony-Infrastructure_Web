<?php 


$mot_de_passe = "test";

echo $mot_de_passe;
echo password_hash($mot_de_passe, PASSWORD_DEFAULT);

?>