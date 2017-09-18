
<!-- <i class="glyphicon glyphicon-search"></i> -->
<!-- glyphicon :  https://www.w3schools.com/bootstrap/bootstrap_ref_comp_glyphs.asp -->
<!-- <i class="glyphicon glyphicon-camera"></i> -->
<!-- <i class="glyphicon glyphicon-star"></i> -->
<!-- Menu actif -->
<?php
//menu1 tous les boutons sont actifs et le bouton on/off lance la demande de deconnexion
echo '<div class="container-fluid">
      <ul class="nav nav-justified">
      <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-lock"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-piggy-bank"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-cutlery"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-pencil"></i></a></li>
      <li><a href="index.php?bibliotheque=active"><i class="glyphicon glyphicon-book"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-globe"></i></a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="index.php"><i class="glyphicon glyphicon-knight"></i><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php">Magic</a></li>
          <li><a href="index.php">Poker</a></li>
          <li><a href="index.php">Jeux video</a></li>
        </ul>
      </li>
      <li><a href="index.php"><i class="glyphicon glyphicon-picture"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-music"></i></a></li>
      <li><a href="index.php"><i class="glyphicon glyphicon-list"></i></a></li>
      <!--<li><a href="index.php?click_connexion=deconnecte"><i class="glyphicon glyphicon-off"></i></a></li>-->
      <li><a href="index.php?on_off=deconnexion_demande"><i class="glyphicon glyphicon-off"></i></a></li>
    </ul>
  </div>';

// echo '<div class="container">
//   <h3>Basic Navbar Example</h3>
//   <p>A navigation bar is a navigation header that is placed at the top of the page.</p>
// </div>'

?>
