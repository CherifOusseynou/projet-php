<?php
session_start();

   //initialize variables
      $id= 0;
      $nom = "";
      $prenom ="";
      $annee_de_naissance="";
      $note_en_gestion_projet="";
      $note_en_inf="";
      $edit_state= false;


      //Connect to database
      $db = mysqli_connect('localhost', 'root', '','bakelischool' ) ;

   ///Server: adding a student To database If save button is clicked
   if (isset($_POST['save'])){
      $nom= $_POST['nom'] ;
      $prenom= $_POST['prenom'];
      $annee_de_naissance= $_POST['annee_de_naissance'];
      $note_en_gestion_projet= $_POST['note_en_gestion_projet'];
      $note_en_inf= $_POST['note_en_inf'];
   
      $query= "INSERT INTO students (nom, prenom, annee_de_naissance, note_en_inf, note_en_gestion_projet)
      VALUES ('$nom', '$prenom', '$annee_de_naissance', '$note_en_inf', '$note_en_gestion_projet' )";
      
      mysqli_query($db, $query);
      $_SESSION['msg'] = "Student saved";
      header('location: index.php');
   }


   //Update records
   if (isset($_POST['update'])){
      $nom = $db -> real_escape_string($_POST['nom']);
      $prenom = $db -> real_escape_string($_POST['prenom']);
      $annee_de_naissance = $db -> real_escape_string($_POST['annee_de_naissance']);
      $note_en_gestion_projet = $db -> real_escape_string($_POST['note_en_gestion_projet']);
      $note_en_inf = $db -> real_escape_string($_POST ['note_en_inf']);
      $id = $db -> real_escape_string($_POST['id']);

      mysqli_query($db, " UPDATE students SET nom='$nom', prenom='$prenom', annee_de_naissance = '$annee_de_naissance', note_en_inf = '$note_en_inf', note_en_gestion_projet = '$note_en_gestion_projet' WHERE id=$id");
      $_SESSION['msg'] = "Student updated";
      header('location: index.php ');
   }

   //Delete records
   if (isset($_GET['del'])){
      $id = $_GET['del'];
      mysqli_query($db, "DELETE FROM students WHERE id=$id");
      $_SESSION['msg'] = "Student Deleted";
      header('location: index.php');
   }

   
   //Retrieve records
   $results = mysqli_query( $db,  "SELECT * FROM students");


?>