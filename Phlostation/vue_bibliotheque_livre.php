<?php

//récupération des infos du livre dans le tableau
$id                 = $tab_livre['id_livre'];
$titre_livre        = $tab_livre['titre_livre'];
$auteur_livre       = $tab_livre['auteur_livre'];
$categorie_livre    = $tab_livre['categorie_livre'];
$synopsis_livre     = $tab_livre['synopsis_livre'];
$possession         = $tab_livre['possession'];
$lecture            = $tab_livre['lecture'];
$prix_litteraire    = $tab_livre['prix_litteraire'];
$commentaire_livre  = $tab_livre['commentaire_livre'];
$extrait_livre      = $tab_livre['extrait_livre'];

//affichage du livre
echo '<br>';
echo '<h3>' . $titre_livre . '</h3><p>De <a href="index.php?bibliotheque=liste&auteur_livre=' . $auteur_livre . '">' . $auteur_livre . '</a> (' . $possession . ' & ' . $lecture . ')</p>';
echo '<br>';
echo '<p>Catégorie : ' . $categorie_livre . '</p>';
echo '<p>Synopsis : ' . $synopsis_livre . '</p>';
if (!empty($commentaire_livre))
  { echo '<p>Commentaires : ' . $commentaire_livre . '</p>'; }
if (!empty($prix_litteraire))
  { echo '<p>Prix : ' . $prix_litteraire . '</p>'; }
if (!empty($extrait_livre))
  { echo '<p>Extrait : ' . $extrait_livre . '</p>'; }
echo '<br>';
    echo '<p><a href="index.php?bibliotheque=modifier&id_livre=' . $id . '">Modifier </a><a href="index.php?bibliotheque=supprimer&id_livre=' . $id . '">Supprimer</a></p>';
echo '<br>';
echo '<br>';
echo '</div>';
?>
