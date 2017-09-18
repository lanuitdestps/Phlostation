<!DOCTYPE html>
<html>
 <head>
   <title><?php echo $title ?></title>
   <meta charset="UTF-8">
   <!-- Lien pour utilisé bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
   <style type="text/css">
   <?php
   //  $style ='body {height:100%;margin:0;padding:0;}
   //           footer{
   // height: auto;
   // position: fixed;width:100%;bottom:0;border-top:0.1em solid;bottom: 0;height: 1.5em;}' . $style_ajout;
    $style ='body {height:100%;margin:0;padding:0;}
               footer{height:auto;
                 position:fixed;bottom:0; width:100%;
                 border-top:0.1em solid;}' . $style_ajout;
   echo $style; ?>
   </style>
 </head>
 <body>
  <div class="container">
