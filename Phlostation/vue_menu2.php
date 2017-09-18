<!-- Menu inactif -->
<?php
//menu2 la plupart des boutons sont inactifs et le bouton on/off lance la demande de connexion
echo '<div class="container-fluid">
      <ul class="nav nav-justified">
      <li class="active"><a href="index.php"><i class="glyphicon glyphicon-home"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-lock"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-piggy-bank"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-cutlery"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-pencil"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-book"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-globe"></i></a></li>
      <li class="disabled">
        <a class="dropdown-toggle" data-toggle="dropdown" href="index.php"><i class="glyphicon glyphicon-knight"></i><span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="index.php">Magic</a></li>
          <li><a href="index.php">Poker</a></li>
          <li><a href="index.php">Jeux video</a></li>
        </ul>
      </li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-picture"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-music"></i></a></li>
      <li class="disabled"><a href="index.php"><i class="glyphicon glyphicon-list"></i></a></li>
      <!--<li><a href="index.php?click_connexion=connecte"><i class="glyphicon glyphicon-off"></i></a></li>-->
      <li><a href="index.php?on_off=connexion_demande"><i class="glyphicon glyphicon-off"></i></a></li>
    </ul>
    </div>';

?>
<!--  -->
