<?php

include ('server.php');

//include ('pagi.php');
use Ousseynou\Projetcrud\TableHelper;

require './vendor/autoload.php';








//Fetch the record to be updated
if (isset($_GET['edit'])){
   $id = $_GET['edit'];
   $edit_state = true ;

   $rec = mysqli_query($db, "SELECT * FROM students WHERE id=$id" );
   $record = mysqli_fetch_array($rec);

   $id = $record['id'];
   $nom = $record['nom'];
   $prenom = $record['prenom'];
   $annee_de_naissance = $record['annee_de_naissance'];
   $note_en_inf = $record['note_en_inf'];
   $note_en_gestion_projet = $record['note_en_gestion_projet'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge" >
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   
   <!-- CSS only -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
   <link rel="stylesheet" href="./style.css">
 
</head>
<body>

   <div class="container">
      <div class="row">
         <div class="col-md-2">
            <div class="logo text-center">
               <img src="../bakeliexam/img/logo.png" alt="logo">
            </div>
         </div>
         <div class="col-md-8">
            <h1 class="index-title text-center" style="color:green">Liste des Etudiants </h1>
            <h3 class="index-title text-center" style="color:green" >Promotion 2019/2020</h3>
         </div>
         <div class="col-md-2">
            <div class="logo  text-center">
               <img src="../bakeliexam/img/volkeno.jfif" alt="logo" style="width: 90px " ; >
            </div>
         </div>
      </div>
   </div>

   <form action="" >
      <div class="form-group">
         <input type="text" class="form-control" name="q" placeholder="Rechercher par Nom" value="<?= htmlentities($_GET['q'] ?? null) ?> " />
      </div>
      <div style="justify-content: center ;align-items: center; text-align: center;">
         <button class="btn btn-success " style="margin:10px;" >Rechercher</button>
      </div>
   </form>

      <?php if(isset($_SESSION['msg'])): ?>
         <div class="msg ">
            <?php
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
            ?>
         </div>
      <?php endif ?>

<table class="table table-striped ">
   <thead> 
      <tr>
         <th>ID</th>
         <th>Nom</th>
         <th>Prenom</th>
         <th>Annee de naissance</th>
         <th>Note en inf</th>
         <th>Note en gestion de projet</th>
         <th colspan="2" class="text-center" >Action</th>
      </tr>
   </thead>
   <tbody>
      <?php while ($row = mysqli_fetch_array($results)) { ?>
         <tr>
            <td><?php echo $row ['id']; ?></td>
            <td><?php echo $row ['nom']; ?></td>
            <td><?php echo $row ['prenom']; ?></td>
            <td><?php echo $row ['annee_de_naissance']; ?></td>
            <td><?php echo $row ['note_en_inf']; ?></td>
            <td><?php echo $row ['note_en_gestion_projet']; ?></td>
            
            <td>
               <a class="btn btn-success" href="index.php?edit=<?php echo $row['id']; ?>">Edit</a>
            </td>
            <td>
               <a class="btn btn-danger" href="server.php?del=<?php echo $row['id']; ?> ">Delete</a>
            </td>
         </tr>
      <?php } ?>
      </tbody>
   </table>


   

   <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" ></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" ></script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" ></script>

</body>
</html>