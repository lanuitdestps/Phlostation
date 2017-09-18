<?php

//methode de redirection
function redirect($lien_retour)
{
  header('Location:' . $lien_retour);
}

function affiche_info($str)
{
  echo '<div style="text-align:center;">';
  echo '<br>';
  echo '<br><p>' . $str . '</p><br>';
  echo '<br>';
  echo '</div>';
}

//fil d'arianne
// function fil_ariane()
// {
// $chemabs=$_SERVER[SERVER_NAME].$_SERVER[PHP_SELF]; //chemin absolu
// $simpleslash="/";
// // recherche de l'emplacement du 1er /
// $possimpleslash=strpos($chemabs,$simpleslash); // position du 1er slash
// $chaine=$chemabs[$possimpleslash+1];
// for ($i=$possimpleslash+2;$i<strlen($chemabs);$i++) // extraction de la string, suite à ce 1er slash
//      $chaine.=$chemabs[$i];
// $chaine=strrev($chaine); // inversion de la string
// $possimpleslash=strpos($chaine,$simpleslash); //1er slash à partir de la fin
// $chaine2=$chaine[$possimpleslash+1];
// for ($i=$possimpleslash+2;$i<strlen($chaine);$i++) // extraction de la string (suite à ce slash (donc si la chaîne n'était pas inversée, supprime tout ce qui est après le slash
//      $chaine2.=$chaine[$i];
// $chaine=strrev($chaine2); // inversion de la chaîne
// $chaine=str_replace("/"," / ",$chaine);
// return($chaine);
// }
// echo "<font face=Arial>Vous &ecirc;tes ici :".fil_ariane()."</font><br>";


?>
