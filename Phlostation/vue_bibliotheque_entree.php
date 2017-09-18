<?php

if (!empty($tab_livre))
{
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

  echo '<h3>Modification d\'un livre</h3>';
  echo '<br>';
  echo '<form method="post" action="index.php?bibliotheque=verif_modif&id_livre=' . $id . '">';
  echo '<label for="titre_livre">Titre du livre</label><br>';
  echo '<input id="titre_livre" type="text" name="titre_livre" value="' . $titre_livre . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="auteur_livre">Auteur du livre (nom en premier)</label><br>';
  echo '<input id="auteur_livre" type="text" name="auteur_livre" value="' . $auteur_livre . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="categorie_livre">Categorie du livre (roman par défaut../sf/philosophie/roman historique/conte)</label><br>';
  echo '<input id="categorie_livre" type="text" name="categorie_livre" value="' . $categorie_livre . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="synopsis_livre">Synopsis du livre (facultatif)</label><br>';
  echo '<textarea id="synopsis_livre" type="text" name="synopsis_livre">' . $synopsis_livre . '</textarea>';
  echo '<br>';
  echo '<br>';
  echo '<label for="possession">Possession (possédé/à acheter/à vendre)</label><br>';
  echo '<input id="possession" type="text" name="possession" value="' . $possession . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="lecture">Lecture (lu/en cours/à lire par defaut)</label><br>';
  echo '<input id="lecture" type="text" name="lecture" value="' . $lecture . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="prix_litteraire">Prix littéraire ? (facultatif)</label><br>';
  echo '<input id="prix_litteraire" type="text" name="prix_litteraire" value="' . $prix_litteraire . '">';
  echo '<br>';
  echo '<br>';
  echo '<label for="commentaire_livre">Commentaires sur le livre (facultatif)</label><br>';
  echo '<textarea id="commentaire_livre" type="text" name="commentaire_livre">' . $commentaire_livre . '</textarea>';
  echo '<br>';
  echo '<br>';
  echo '<label for="extrait_livre">Extrait du livre (facultatif)</label><br>';
  echo '<textarea id="extrait_livre" type="text" name="extrait_livre">' . $extrait_livre . '</textarea>';
  echo '<br>';
  echo '<br>';
  echo '<input type="submit" name="enregistrer" value="Mettre à jour" />';
  echo '<br>';
  echo '<br>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
}
else
{
  echo '<h3>Entrée d\'un livre</h3>';
  echo '<br>';
  echo '<br>';
  echo '<form method="post" action="index.php?bibliotheque=verif_entree">';
  echo '<label for="titre_livre">Titre du livre</label><br>';
  echo '<input id="titre_livre" type="text" name="titre_livre">';
  echo '<br>';
  echo '<br>';
  echo '<label for="auteur_livre">Auteur du livre (nom en premier)</label><br>';
  echo '<input id="auteur_livre" type="text" name="auteur_livre">';
  echo '<br>';
  echo '<br>';
  echo '<label for="categorie_livre">Categorie du livre (roman par défaut../sf/philosophie/roman historique/conte)</label><br>';
  echo '<input id="categorie_livre" type="text" name="categorie_livre" value="roman">';
  echo '<br>';
  echo '<br>';
  echo '<label for="synopsis_livre">Synopsis du livre (facultatif)</label><br>';
  echo '<textarea id="synopsis_livre" type="text" name="synopsis_livre"></textarea>';
  echo '<br>';
  echo '<br>';
  echo '<label for="possession">Possession (possédé/à acheter/à vendre)</label><br>';
  echo '<input id="possession" type="text" name="possession">';
  echo '<br>';
  echo '<br>';
  echo '<label for="lecture">Lecture (lu/en cours/à lire par defaut)</label><br>';
  echo '<input id="lecture" type="text" name="lecture" value="à lire">';
  echo '<br>';
  echo '<br>';
  echo '<label for="prix_litteraire">Prix littéraire ? (facultatif)</label><br>';
  echo '<input id="prix_litteraire" type="text" name="prix_litteraire">';
  echo '<br>';
  echo '<br>';
  echo '<label for="commentaire_livre">Commentaires sur le livre (facultatif)</label><br>';
  echo '<textarea id="commentaire_livre" type="text" name="commentaire_livre"></textarea>';
  echo '<br>';
  echo '<br>';
  echo '<label for="extrait_livre">Extrait du livre (facultatif)</label><br>';
  echo '<textarea id="extrait_livre" type="text" name="extrait_livre"></textarea>';
  echo '<br>';
  echo '<br>';
  echo '<input type="submit" name="enregistrer" value="Enregistrer" />';
  echo '<br>';
  echo '<br>';
  echo '</form>';
  echo '</div>';
  echo '</div>';
}
?>
