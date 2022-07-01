<?php


try{
   $pdo = new PDO("mysql:host=$servname; dbname=$dbname", $user, $pass);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

   if(!$pdo){
      die(mysqli_error($pdo));
   }
   





         /*echo '<pre>';
      *print_r($resultat);
      *echo '</pre>';
      */
   }
         
   catch(PDOException $e){
      echo "Erreur : " . $e->getMessage();
   }




?>