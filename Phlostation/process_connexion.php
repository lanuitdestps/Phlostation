<?php
//1. test etat de session pour savoir quel menu afficher et initialiser la variable de session 'connexion'
if (!isset($_SESSION['connexion']) )
  {//affichage du menu sécurisé car aucune variable connexion
    include('vue_menu2.php');
    $_SESSION['connexion']='ko';//initialisation de la variable connexion à ko
  }
  elseif (isset($_SESSION['connexion']) && $_SESSION['connexion'] === 'ko' )
  {
    if (isset($_POST['mot_de_passe']) && $_POST['mot_de_passe'] === 'mp')  {  } //pas de menu
    else { include('vue_menu2.php'); }//affichage du menu sécurisé car variable connexion = ko
  }
  elseif (isset($_SESSION['connexion']) && $_SESSION['connexion'] === 'ok' && !isset($_POST['mot_de_passe']) )
  {
    if (isset($_GET['on_off']) && $_GET['on_off'] === 'deconnexion_demande')
    {//affichage du menu sécurisé car demande de deconnexion, même si la variable de session est toujours ok !!!
      include('vue_menu2.php');
      $_SESSION['connexion']='ko';//initialisation de la variable connexion à ko
      session_unset();//vide toutes les variables de session
      session_destroy();//termine la session
      affiche_info('Session terminée, t\'es bien deconnecté !');//confirmation de déconnexion
      // include('vue_deconnexion.php');// affichage de la confirmation de déconnection
    }
    else  { include('vue_menu.php'); }//affichage du menu libre car variable connexion = ok
  }
//2. test demande de connexion
if (isset($_GET['on_off']) && $_GET['on_off'] === 'connexion_demande')
  { include('vue_connexion.php'); }//si une conexion est demandée affichage du formulaire de connexion
  elseif (!isset($_GET['on_off'])) { }//si aucune co/deco demandé, rien à faire
  elseif (isset($_GET['on_off']) && $_GET['on_off'] !== 'connexion_demande' && $_GET['on_off'] !== 'deconnexion_demande')
  affiche_info('Bande de bandit barbante !');
  // { include('vue_hacker'); } // contre le hackage !
// 3. test avec les variables post (mp)
if (!empty($_POST['mot_de_passe']) && $_POST['mot_de_passe'] === 'mp')
{//affichage du menu libre car mp ok, pourtant la variable connexion = ko !!!
  include('vue_menu.php');
  //ICI initialisation de variables de session possible, les mettre vide
  $_SESSION['connexion'] = 'ok';
  $_SESSION['creation_livre'] ='';//variable renseignant l'état de creation d'un livre
  $_SESSION['modifie_livre'] ='';//variable renseignant l'état de modification d'un livre 
  $_SESSION['livre_serialize'] ='';//variable contenant les infos d'un livre de la bd, sérialisées
  $_SESSION['recherche_livre'] ='';
  //peut-etre à déplacer en debut de script ??!!
  affiche_info('T\'es bien connecté !<br><br>Et t\'as accès au menu maintenant !!');// affichage de la confirmation de connexion
  // include('vue_confirme_connexion.php');// affichage de la confirmation de connexion
}
elseif (isset($_POST['mot_de_passe']) && empty($_POST['mot_de_passe']))
{ include('vue_connexion.php'); }
elseif (!empty($_POST['mot_de_passe']) && $_POST['mot_de_passe'] !== 'mp')
{ affiche_info('C\'est pas ça !!!'); include('vue_connexion.php');}
?>
