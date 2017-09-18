<?php

session_start();
var_dump($_SESSION);//test affichage des variables de session

include('fonctions.php');

//sidenav pr la page biblio fonctionnant avec js
// if (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'active' )
// {  $style_ajout = 'sidenav { height: 100%; /* 100% Full-height */ width: 0; /* 0 width - change this with JavaScript */ position: fixed; /* Stay in place */ z-index: 1; /* Stay on top */ top: 0; left: 0; background-color: #111; /* Black*/ overflow-x: hidden; /* Disable horizontal scroll */ padding-top: 60px; /* Place content 60px from the top */ transition: 0.5s; /* 0.5 second transition effect to slide in the sidenav */} sidenav a { padding: 8px 8px 8px 32px; text-decoration: none; font-size: 25px; color: #818181; display: block; transition: 0.3s } sidenav a:hover, .offcanvas a:focus{ color: #f1f1f1; } sidenav .closebtn { position: absolute; top: 0; right: 25px; font-size: 36px; margin-left: 50px; } ';}

//ici ajout d'instruction css à la suite de la variable style de l'entete en fonction de la page affichée, donc test
$style_ajout = '';
$title = 'Phlostation';
include('vue_entete.php');
// echo "$style";//test verif variable style

$logo_site = '../logo/Phlostation-logo.png';
include('vue_bandeau.php');
echo '<br>';


include('process_connexion.php');
//attention à l'initialisation des variables de session dans process_connexion !!!

// La classe bibliothèque contient les fonctions lié aux action dans la page bibliothèque
include('Bibliotheque.php');

/*
les variables de session :
$_SESSION['creation_livre'] ='';
$_SESSION['liste_livre'] ='';
$_SESSION['recherche_livre'] ='';
$_SESSION['extrait_livre'] ='';
*/

if (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'active' )
  {//test si affichage de  la page bibliothèque doit être lancé
  include('vue_bibliotheque.php');// affiche la page bibliotheque
  }
elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'entree')
  {
  include('vue_bibliotheque.php');
  include('vue_bibliotheque_entree.php');
  }
elseif (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'verif_entree' )
  {//test vérifiant si les données sont bien en post, pour lancé la requete de création d'un livre dans la bd
  if (!empty($_POST['titre_livre']) && !empty($_POST['auteur_livre']) && !empty($_POST['categorie_livre']) && !empty($_POST['possession']) && !empty($_POST['lecture']))
    {//verification que toutes les données obligatoires sont remplies
    include('vue_bibliotheque.php');
    $livre = new Bibliotheque;
    $livre->entree_livre();
    affiche_info($_SESSION['creation_livre']);//affiche du résultat de creation du livre
    if ($_SESSION['creation_livre'] === 'Le livre n\'a pas été enregistrer en base')
      {//réaffiche le formulaire d'entree au cas ou la requete ne fonctionne pas dans la class biblio ou à cause d'un pb ds la bd
       include('vue_bibliotheque_entree.php');
      }
    $_SESSION['creation_livre'] = '';// réinitialisation de la var creation_livre
    }
  else
    {
    $_SESSION['creation_livre'] = 'Le livre n\'a pas été enregistrer en base car il manquait des infos';//initialisation
    include('vue_bibliotheque.php');
    affiche_info('Hep ! T\'as pas oublié de remplir des champs là !!?<br><br>' . $_SESSION['creation_livre']);
    include('vue_bibliotheque_entree.php');
    // echo '<br><a href="index.php">Retour au formulaire</a>';
    $_SESSION['creation_livre'] = '';// réinitialisation de la var creation_livre
    }
  }
elseif (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'verif_modif' )
  {
  if (!empty($_POST['titre_livre']) && !empty($_POST['auteur_livre']) && !empty($_POST['categorie_livre']) && !empty($_POST['possession']) && !empty($_POST['lecture']))
    {//verification que toutes les données obligatoires sont remplies
    include('vue_bibliotheque.php');
    $livre = new Bibliotheque;
    $livre->modifie_livre($_GET['id_livre']);
    affiche_info($_SESSION['modifie_livre']);//affiche du résultat de creation du livre
    if ($_SESSION['modifie_livre'] === 'Le livre n\'a pas été modifier en base')
      {//réaffiche le formulaire d'entree au cas ou la requete ne fonctionne pas dans la class biblio ou à cause d'un pb ds la bd
      // $livre->affiche_livre($_GET['id_livre']);
      // $tab_livre = unserialize($_SESSION['livre_serialize']);
      // include('vue_bibliotheque_entree.php');
      // $_SESSION['livre_serialize'] = '';
      }
    $_SESSION['modifie_livre'] = '';// réinitialisation de la var creation_livre
    }
  else
    {
    $_SESSION['modifie_livre'] = 'Le livre n\'a pas été enregistrer en base car il manquait des infos';//initialisation
    include('vue_bibliotheque.php');
    affiche_info('Hep ! T\'as pas oublié de remplir des champs là !!?<br><br>' . $_SESSION['modifie_livre']);
    // include('vue_bibliotheque_entree.php');
    // echo '<br><a href="index.php">Retour au formulaire</a>';
    $_SESSION['modifie_livre'] = '';// réinitialisation de la var creation_livre
    }
  }
elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'liste')
  {
  include('vue_bibliotheque.php');// affiche la page bibliotheque
  $livre = new Bibliotheque;
  if (!isset($_GET['id_livre']) && !isset($_GET['auteur_livre']) )
    {//test si aucune infos n'est passées en url
    echo '<br>';
    $livre->liste_livre();//appel de la méthode listant les titres et auteurs de livre
    echo '</div>';
    }
  // test si id est transmis dans l'url
  elseif (isset($_GET['id_livre']))
    {// afficher le livre dont l'id est transmis
    $livre->affiche_livre($_GET['id_livre']);//Appel de la méthode donnant les infos d'un livre dans la variable de session $_SESSION['creation_livre'] de façon sérialisé
    $tab_livre = unserialize($_SESSION['livre_serialize']);//les infos du livre sont mises dans un tableau
    include('vue_bibliotheque_livre.php');
    $_SESSION['livre_serialize'] ='';
    }
  // test si auteur est transmis dans l'url
  elseif (isset($_GET['auteur_livre']))
    {// afficher le livre dont l'auteur est transmis
    echo '<br>';
    $livre->liste_livre($_GET['auteur_livre']);//Appel de la méthode listant les livres
    echo '</div>';
    }
  }
elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'modifier')
  {
  include('vue_bibliotheque.php');
  $livre = new Bibliotheque;
  $livre->affiche_livre($_GET['id_livre']);//sérialise le livre dont l'id est dans l'url
  $tab_livre = unserialize($_SESSION['livre_serialize']); //récupère les infos du livre dans un tableau
  include('vue_bibliotheque_entree.php');
  $_SESSION['livre_serialize'] = '';//réinitialisation de la variable de session
  }
elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'supprimer')
  {

  }
elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'recherche')
  {
  include('vue_bibliotheque.php');// affiche la page bibliotheque
  include('vue_bibliotheque_recherche.php');
  }
// elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'extrait')
// {
//   include('vue_bibliotheque.php');// affiche la page bibliotheque
//   include('vue_bibliotheque_extrait.php');
// }





// if (isset($_SESSION['connexion']) && $_SESSION['connexion'] === 'ok' )
//   {//test si la session est ouverte, sert à rien car le menu est bloqué si la session est pas ouverte !!!!!!!!!!!!!!!!!!!!!
  //pour l'entree d'un livre en bd
    //   if (isset($_GET['bibliotheque']) && !empty($_SESSION['creation_livre']))
    //   {//test si la var bibliotheque est présente et si la var creation de livre renseigne une chaine
    //     include('vue_bibliotheque.php');// affiche la page bibliotheque
    //     echo $_SESSION['creation_livre'] . '<br><br>';//affiche l'état du processus de creation d'un livre
    //     include('vue_bibliotheque_entree.php');// affiche le formulaire de creation d'un livre
    //     $_SESSION['creation_livre'] = '';//réinitialise la var creation de livre à vide
    //   }
    // //pour l'affichage de la page biblio
    //   elseif (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'active' )
    //   {//test si la page bibliothèque doit être lancé
    //     include('vue_bibliotheque.php');
    //   }
    // //pour l'entree d'un livre en bd... encore !!!
    //   elseif(isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'entree' && empty($_POST['titre_livre']) && $_SESSION['creation_livre'] === '' )
    //   {//test si le formulaire de creation d'un livre doit être lancé
    //     include('vue_bibliotheque.php');
    //     include('vue_bibliotheque_entree.php');
    //   }
    // //pour la vérification des infos de creation d'un livre
    //   elseif (isset($_GET['bibliotheque']) && $_GET['bibliotheque'] === 'verif_entree' )
    //   {//test vérifiant si les données sont bien en post, pour lancé la requete de création d'un livre dans la bd
    //     echo $_SESSION['creation_livre'];
    //     if (!empty($_POST['titre_livre']) && !empty($_POST['auteur_livre']) && !empty($_POST['categorie_livre']) && !empty($_POST['possession']) && !empty($_POST['lecture']))
    //     {
    //       // $_SESSION['creation_livre'] = 'ko';//initialisation
    //       include('vue_bibliotheque.php');
    //       $livre = new Bibliotheque;
    //       $livre->entree_livre();
    //       //redirection vers ici pour prendre encompte la nouvelle variable de session
    //       echo $_SESSION['creation_livre'];
    //       // header('Location:index.php?bibliotheque=active');
    //       // echo $livre;
    //     }
    //     else
    //     {
    //       $_SESSION['creation_livre'] = 'Le livre n\'a pas été enregistrer en base car il manquait des infos';//initialisation
    //       echo '<br><p>Hep ! T\'as pas oublié de remplir des champs là !!?s<br></p>';
    //       // header('Location:#');
    //       echo '<br><a href="index.php">Retour au formulaire</a>';
    //     }
    //   }
  // }
var_dump($_SESSION);//test









$email_contact = 'florentgaudel@gmail.com';
include('vue_basdepage.php');

?>
