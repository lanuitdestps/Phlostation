<?php
Class Bibliotheque //Déclaration de la classe
{
  private $mysqli ; // cet attribut sert à stocker la connexion à la base de données

  //methode de connexion à la base de données
  public function __construct()
    {
    $this->mysqli = new mysqli('localhost', 'root', '', 'phlostation');
    $this->mysqli->query("SET NAMES 'utf8'");//les caractères de la requete sont réglés sur utf8????????
    }

  //méthode insérant un livre en bd
  public function entree_livre()
    {
    // $id_livre           = htmlspecialchars($_POST['id_livre']);
    $titre_livre        = htmlspecialchars($_POST['titre_livre']);
    $auteur_livre       = htmlspecialchars($_POST['auteur_livre']);
    $categorie_livre    = htmlspecialchars($_POST['categorie_livre']);
    $synopsis_livre     = htmlspecialchars($_POST['synopsis_livre']);
    $possession         = htmlspecialchars($_POST['possession']);
    $lecture            = htmlspecialchars($_POST['lecture']);
    $prix_litteraire    = htmlspecialchars($_POST['prix_litteraire']);
    $commentaire_livre  = htmlspecialchars($_POST['commentaire_livre']);
    $extrait_livre      = htmlspecialchars($_POST['extrait_livre']);
    $sql = 'INSERT INTO phlostation.bibliotheque (id_livre, titre_livre, auteur_livre, categorie_livre, synopsis_livre, possession, lecture, prix_litteraire, commentaire_livre, extrait_livre) VALUES (NULL, "'. $titre_livre .'", "'.  $auteur_livre .'", "'.  $categorie_livre .'", "'.  $synopsis_livre .'", "'.  $possession .'", "'.  $lecture .'", "'.  $prix_litteraire .'", "'.  $commentaire_livre . '", "' . $extrait_livre . '" )';
    // echo $sql;//test
    $result = $this->mysqli->query($sql);
    // var_dump($result);//test renvoi true si bien inséré
    // echo $result;//test affichant 0 si ok, 1 si ko
    if($result === true)
      {$_SESSION['creation_livre'] = 'Le livre à bien été enregistrer en base';}
    else
      {$_SESSION['creation_livre'] = 'Le livre n\'a pas été enregistrer en base';}
    return $result;
    } // Fin de la méthode


    // public function bd_livre()
    // {
    //   $sql = 'SELECT id_livre, titre_livre, auteur_livre, categorie_livre, synopsis_livre, possession, lecture, prix_litteraire, commentaire_livre, extrait_livre FROM phlostation.bibliotheque';
    //   //connexion à la base de données avec l'attribut mysqli et au moyen de la méta-variable this.
    //   $result = $this->mysqli->query($sql);
    //   while ($row = $result->fetch_array())
    //   {
    //     $bd_livre[]['titre_livre']          = $row['titre_livre'];
    //     $bd_livre[]['auteur_livre']         = $row['auteur_livre'];
    //     $bd_livre[]['categorie_livre']      = $row['categorie_livre'];
    //     $bd_livre[]['synopsis_livre']       = $row['synopsis_livre'];
    //     $bd_livre[]['possession']           = $row['possession'];
    //     $bd_livre[]['lecture']              = $row['lecture'];
    //     $bd_livre[]['prix_litteraire']      = $row['prix_litteraire'];
    //     $bd_livre[]['commentaire_livre']    = $row['commentaire_livre'];
    //     $bd_livre[]['extrait_livre']        = $row['extrait_livre'];
    //   }
    //   return $bd_livre;
    // }// fin de la méthode//

  //méthode affichant la liste des livres par ordre alphabétique de l'auteur. En argument facultatif, si l'auteur est précisé, n'affiche que les livres de l'auteur
  public function liste_livre($auteur_livre = '')
    {
    if (empty($auteur_livre))
      {
      $sql = 'SELECT id_livre, titre_livre, auteur_livre, categorie_livre, synopsis_livre, possession, lecture, prix_litteraire, commentaire_livre, extrait_livre FROM phlostation.bibliotheque ORDER BY auteur_livre';
      //connexion à la base de données avec l'attribut mysqli et au moyen de la méta-variable this.
      $result = $this->mysqli->query($sql);
      while ($row =$result->fetch_array())
        {
        $id             = $row['id_livre'];
        $titre_livre    = $row['titre_livre'];
        $auteur_livre   = $row['auteur_livre'];
        echo '<p><a href="index.php?bibliotheque=liste&id_livre=' . $id . '">' . $titre_livre . '</a>';
        echo ', ';
        echo '<a href="index.php?bibliotheque=liste&auteur_livre=' . $auteur_livre . '">' . $auteur_livre . '</a></p>';
        echo '<br>';
        }
      }
    else
      {
      $sql = 'SELECT id_livre, titre_livre, auteur_livre FROM phlostation.bibliotheque WHERE auteur_livre = "'. $auteur_livre . '"';
      //connexion à la base de données avec l'attribut mysqli et au moyen de la méta-variable this.
      $result = $this->mysqli->query($sql);
      echo '<h3>' . $auteur_livre . '</h3>';
      echo '<br>';
      while ($row =$result->fetch_array())
        {
        $id = $row['id_livre'];
        $titre_livre = $row['titre_livre'];
        $auteur_livre = $row['auteur_livre'];
        echo '<p><a href="index.php?bibliotheque=liste&id_livre=' . $id . '">' . $titre_livre . '</a></p>';
        echo '<br>';
        }
      }
    }// fin de la méthode//

  //méthode affichant toutes les infos d'un livre contenu dans la bd
  public function affiche_livre($id_livre)
    {//requete sql avec l'id du livre a afficher
    $sql = 'SELECT id_livre, titre_livre, auteur_livre, categorie_livre, synopsis_livre, possession, lecture, prix_litteraire, commentaire_livre, extrait_livre FROM bibliotheque WHERE id_livre = ' . $id_livre;
    //connexion à la base de données
    $result = $this->mysqli->query($sql);
    //parcours de la ligne de résultat
    $row = $result->fetch_array();
    //assignation des variables
    // $id                 = $row['id_livre'];
    // $titre_livre        = $row['titre_livre'];
    // $auteur_livre       = $row['auteur_livre'];
    // $categorie_livre    = $row['categorie_livre'];
    // $synopsis_livre     = $row['synopsis_livre'];
    // $possession          = $row['possession'];
    // $lecture            = $row['lecture'];
    // $prix_litteraire    = $row['prix_litteraire'];
    // $commentaire_livre  = $row['commentaire_livre'];
    // $extrait_livre      = $row['extrait_livre'];

    //sérialisation du tableau de résultat
    $livre_serialize = serialize($row);
    //echo $livre_serialize;//vérif
    //assignation de la variable de session contenant les infos du livre sérialisées
    $_SESSION['livre_serialize'] = $livre_serialize;
    // return $row;

    //affichage
    // echo '<h3>' . $titre_livre . '</h3><p>De <a href="index.php?bibliotheque=liste&auteur_livre=' . $auteur_livre . '">' . $auteur_livre . '</a> (' . $possession . ' & ' . $lecture . ')</p>';
    // echo '<br>';
    // echo '<p>Catégorie : ' . $categorie_livre . '</p>';
    // echo '<p>Synopsis : ' . $synopsis_livre . '</p>';
    // echo '<p>Commentaires : ' . $commentaire_livre . '</p>';
    // if (!empty($prix_litteraire))
    //   { echo '<p>Prix : ' . $prix_litteraire . '</p>'; }
    // if (!empty($extrait_livre))
    //   { echo '<p>Extrait : ' . $extrait_livre . '</p>'; }
    // echo '<br>';
    //     echo '<p><a href="index.php?bibliotheque=modifier&id_livre=' . $id . '">Modifier</a><a href="index.php?bibliotheque=supprimer&id_livre=' . $id . '">Supprimer</a></p>';
    // echo '<br>';
    // echo '<br>';

    }
  //méthode modifiant un livre contenu dans la bd
  public function modifie_livre($id_livre)
    {//récupération des champs à modifier
    $titre_livre        = htmlspecialchars($_POST['titre_livre']);
    $auteur_livre       = htmlspecialchars($_POST['auteur_livre']);
    $categorie_livre    = htmlspecialchars($_POST['categorie_livre']);
    $synopsis_livre     = htmlspecialchars($_POST['synopsis_livre']);
    $possession         = htmlspecialchars($_POST['possession']);
    $lecture            = htmlspecialchars($_POST['lecture']);
    $prix_litteraire    = htmlspecialchars($_POST['prix_litteraire']);
    $commentaire_livre  = htmlspecialchars($_POST['commentaire_livre']);
    $extrait_livre      = htmlspecialchars($_POST['extrait_livre']);
    //requete sql avec l'id du livre a modifier
    $sql = 'UPDATE bibliotheque SET titre_livre = "'. $titre_livre .'", auteur_livre = "'.  $auteur_livre .'", categorie_livre = "'.  $categorie_livre .'", synopsis_livre = "'.  $synopsis_livre .'", possession = "'.  $possession .'", lecture = "'.  $lecture .'", prix_litteraire = "'.  $prix_litteraire .'", commentaire_livre = "'.  $commentaire_livre . '", extrait_livre = "' . $extrait_livre . '" WHERE id_livre = ' . $id_livre;
    //connexion à la base de données
    $result = $this->mysqli->query($sql);
    var_dump($result);//test renvoi true si bien inséré
    echo $result;//test affichant 0 si ok, 1 si ko
    if($result === true)
      {$_SESSION['modifie_livre'] = 'Le livre à bien été modifier en base';}
    else
      {$_SESSION['modifie_livre'] = 'Le livre n\'a pas été modifier en base';}
    return $result;
    }
  //faire une fonctio pour modifier la bd  ? : ALTER TABLE `bibliotheque` ADD `extrait_livre` TEXT NOT NULL AFTER `commentaire_livre`;
  // $table_a_changer = 'phlostation.bibliotheque';
  // $champs_ajouter = 'extrait_livre';
  // $champs_type = 'TEXT';
  // $obligatoire_facultatif = 'NULL';
  //
  // $sql = 'ALTER TABLE ' . $table_a_changer . ' ADD ' . $champs_ajouter . $champs_type . $obligatoire_facultatif;
  // echo $sql;

}
?>
