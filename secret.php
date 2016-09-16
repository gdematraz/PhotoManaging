<?php

session_start();

$access_granted = false;

if (isset($_SESSION['user'])) {
  $access_granted = true;
}

 ?><!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Document secret</title>
   </head>
   <body>
     <?php
     ?>
     <?php if ($access_granted): ?>
       <h1>Top super page !</h1>
       <div class="">
         Access granted !!!
       </div>
       <p>
         <a href="index.php">Retour à l'index</a>
       </p>
     <?php else: ?>
       <h1>Access verboten !!!!</h1>
       <a href="index.php">Logguez vous</a>
     <?php endif; ?>
   </body>
 </html>
