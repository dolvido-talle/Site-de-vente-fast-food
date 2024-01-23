<?php

require 'admin/database.php';


//extraction de données.
if(isset($_POST['ok'])){ // verfife sur le formulaire a été soumis avec succès
   
    $email = $_POST['email'];
    $mdp = $_POST['pass'];

    $bdd = Database::connect();
    if($email!="" && $mdp!=""){
      $requete = $bdd->prepare("INSERT INTO users VALUES (id, :mdp, :email, 0)");
        $requete->execute( // on éxécute la requète avec un tableau associatif de valeur
            array(
            
                "mdp"=> $mdp,
                "email"=> $email

                


            )
            
            );
            header("Location: connexion.php");
    }else{
        
        header("Location: connexion.php"); 
       
    }
}

?>