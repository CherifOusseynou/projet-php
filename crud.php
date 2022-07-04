<h1 class="text-center pt-5">Ajouter un étudiant</h1>
   <form method="post" action="server.php" >
      <input type="hidden" name="id" value="<?php echo $id; ?> " />
         <div class="input-group">
            <label>Nom: </label> 
            <input type="text" name="nom" value="<?php echo $nom; ?>" />
         </div>
         <div class="input-group">
            <label>Prenom: </label> 
            <input type="text" name="prenom" value="<?php echo $prenom; ?>"/>
         </div>
         <div class="input-group">
            <label>Annee de naissance: </label>
            <input type="text" name="annee_de_naissance" value="<?php echo $annee_de_naissance; ?>" />
         </div>
         <div class="input-group">
            <label>Note en gestion de projet: </label>
            <input type="text" name="note_en_gestion_projet" value="<?php echo $note_en_gestion_projet; ?>"/>
         </div>
         <div class="input-group">
            <label>Note en informatiue: </label>
            <input type="text" name="note_en_inf" value="<?php echo $note_en_inf; ?>" />
         </div>
         
      </div>

      <div class="input-group">
         <?php if ($edit_state == false):  ?>
            <button type="submit" name="save" class="btn btn-danger"> Save </button>
         <?php else: ?>
            <button type="submit" name="update" class="btn btn-danger"> Update </button>
         <?php endif ?>

      </div>
   </form>
