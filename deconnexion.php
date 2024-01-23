
    <?php

    session_start();
    session_destroy(); //on détruit la variable de session
    header("location:connexion.php"); // on rédirige vers l'accueil
    $sum=0;

    ?>