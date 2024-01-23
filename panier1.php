
<?php 
   session_start();
   include_once "admin/database.php";
   //require 'admin/database.php';

   //supprimer les produits
   //si la variable del existe
    $id_del = $_GET['id'] ;
    
   array_push($_SESSION['panier'],$id_del);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>
    <link rel="stylesheet" href="css/styleP.css">
    <script src="paypal.js"></script>
</head>
<body class="panier">
    <a href="accueil.php" class="link">Fast-Food</a>
    <section>
        <table>
            <tr>
                <th></th>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Action</th>
            </tr>
            <?php 
                function count_val($list, $val){
                    $compteur = 0;

                    // Parcourir le tableau et compter les occurrences
                    foreach ($list as $valeur) {
                        if ($valeur === $val) {
                            $compteur++;
                        }
                    }
                    return $compteur;
                }
              $total = 0 ;
              // liste des produits
              //récupérer les clés du tableau session
              $ids = $_SESSION['panier'];
              //s'il n'y a aucune clé dans le tableau
              if(empty($ids)){
                echo "Votre panier est vide";
              }else {
                //si oui 
                $db = Database::connect();
                $items = $db->query("SELECT * FROM items WHERE id IN (".implode(',', $ids).")");
                //lise des produit avec une boucle foreach
                foreach($items as $item):
                    //calculer le total ( prix unitaire * quantité) 
                    //et aditionner chaque résutats a chaque tour de boucle
                    $total = $total + $item['price'];
                ?>
                <tr>
                    <td><img src="images/<?=$item['image']?>"></td>
                    <td><?=$item['name']?></td>
                    <td><?=$item['price']?>€</td>
                    <td><?=count_val($_SESSION['panier'], $item['id']); // Quantité?></td>
                    <td><a href="panier.php?del=<?=$item['id']?>"><img src="images/delete.png"></a></td>
                </tr>

            <?php endforeach ;} ?>

            <tr class="total">
                <th>Total : <?=$total?>€</th>
                <th>
                <button  name="paye"><a href="paypal.html" >payer <?=$total?>€</a></button>
                </th>
            </tr>
            <?php
           // require 'admin/database.php';
           

              
            if (isset($_SESSION["autoriser"]) && $_SESSION["autoriser"] === "oui" ) {
                
                $email = $_SESSION["mail"];
                // Modifier le 'point' de l'utilisateur dans la base de données
                $bdd = Database::connect(); 
                $nouveauPoint =5;
                $nouveauPoint =  $nouveauPoint + 0; // Nouvelle valeur de 'point'
                
                $requete = $bdd->prepare("UPDATE users SET points = :nouveauPoint WHERE email = :email");
                $requete->execute(array("nouveauPoint" => $nouveauPoint, "email" => $email));

                
            }

            ?>
        </table>
    </section>
</body>
</html>