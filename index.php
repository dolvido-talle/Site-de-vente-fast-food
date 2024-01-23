   
<!DOCTYPE html>
<html lang="en">
    <head>
        <title> Fast Food </title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href='http://fonts.googleapis.com/css?family=Holtwood+One+SC' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" type="image/png" href="images/hamburger.png" />
    </head>
<body>
<div class="container site">
<!--<h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> FAST-FOOD <span class="glyphicon glyphicon-cutlery"></span></h1>-->
<div class="row">
    <div class="col-8">
    <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> FAST-FOOD <span class="glyphicon glyphicon-cutlery"></span></h1>
    </div>
    <div class="col-4">
    <a href="connexion.php"><button class="btn"> Se connecter</button></a>
    </div>
  </div>

    <?php 
    session_start();
    if(!isset($_SESSION['panier'])){
        $_SESSION['panier'] = array();
    }

    require 'admin/database.php';
    echo ' <nav class="navbar navbar-inverse">
    <div class="container-fluid">     <div class="navbar-header">
      <a class="navbar-brand" href="#">Rubrique</a>
    </div>
      <ul class="nav navbar-nav navbar-right">';

    $db = Database::connect();
    $statement = $db->query('SELECT * FROM categories');
    $category = $statement->fetchAll();
    foreach ($category as $cat) {
      if ($cat['id'] == '1')
        echo '<li  class="active"><a href="#' . $cat['id'] . '"data-toggle="tab">' . $cat['name'] . '</a></li>';
      else
        echo '<li><a href="#' . $cat['id'] . '"data-toggle="tab">' . $cat['name'] . '</a></li>';
    }
    echo ' </ul> </div>
    </nav>';

    echo '<div class="tab-content">';
    foreach ($category as $cat) {
      if ($cat['id'] == '1')
        echo '<div class="tab-pane active" id="' . $cat['id'] . '">';
      else
        echo '<div class="tab-pane" id="' . $cat['id'] . '">';

      echo '<div class="row">';
      $statement = $db->prepare('SELECT * FROM items WHERE items.category = ?');
      $statement->execute(array($cat['id']));

      while ($item = $statement->fetch()) {

        echo '<div class="col-sm-6 col-md-4">
        <div class="thumbnail"> <img src="images/' . $item['image'] . '" alt=".">
          <div class="price">' . number_format((float) $item['price'], 2, '.', '') . ' €</div>
          <div class="caption">
            <h4>' . $item['name'] . '</h4>
            <p>' . $item['description'] . '</p>
            <a href="panier1.php?id=' . $item['id'] . '" class="btn btn-order" role="button"> <span
                class="glyphicon glyphicon-shopping-cart"></span>Ajouter au panier</a>
          </div>

        </div>
      </div>';
      }

      echo '</div>
</div>';
    }
    Database::disconnect();
    echo '</div>';
    ?>

  </div>  



  

<!-- <div class="container site">
        <h1 class="text-logo"><span class="glyphicon glyphicon-cutlery"></span> FAST-FOOD <span class="glyphicon glyphicon-cutlery"></span></h1> -->
       <!--navbar-->
    <!--    <nav>
            <ul class="nav nav-pills">
                <li role="presentation" class="active"> <a href="#elt1" data-toggle="tab">Menus</a></li>
                <li role="presentation" > <a href="#elt2" data-toggle="tab">Burgers</a></li>
                <li role="presentation" > <a href="#elt3" data-toggle="tab">Snacks</a></li>
                <li role="presentation" > <a href="#elt4" data-toggle="tab">Salades</a></li>
                <li role="presentation" > <a href="#elt5" data-toggle="tab">Boissons</a></li>
                <li role="presentation" > <a href="#elt6" data-toggle="tab">Desserts</a></li>
                <li role="presentation" > <a href="#elt7" data-toggle="tab">Plats africains</a></li>
                <li> <a href="./register.html"  id="envoyer">Inscription</a></li>
            </ul>
        </nav> -->

         <!--menu-->
      <!--  <div class="tab-content">
            <div class="tab-pane active" id="elt1">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/m1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/m2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/m3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/m4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/m5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->


            <!--Burgers-->
          <!--  <div class="tab-pane" id="elt2">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/b1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/b2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/b3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/b4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/b5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->

            <!--snacks-->
          <!--  <div class="tab-pane" id="elt3">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/s1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/s2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/s3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/s4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/s5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>  -->

             <!--salades-->
           <!--  <div class="tab-pane" id="elt4">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/sa1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/sa2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/sa3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/sa4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/sa5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->

              <!--boissons-->
            <!--  <div class="tab-pane" id="elt5">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/bo6.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->

               <!--desserts-->
            <!--   <div class="tab-pane" id="elt6">
                <div class="row">
                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/d1.png" alt="">
                            <div class="price">8.90€</div>
                            <div class="caption">
                                <h4>Menu Classic</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/d2.png" alt="">
                            <div class="price">9,50€</div>
                            <div class="caption">
                                <h4>Menu Bacon</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/d3.png" alt="">
                            <div class="price">10.90€</div>
                            <div class="caption">
                                <h4>Menu Big</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/d4.png" alt="">
                            <div class="price">10,90€</div>
                            <div class="caption">
                                <h4>Menu Fish</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-md-4">
                        <div class="thumbnail">
                            <img src="images/d5.png" alt="">
                            <div class="price">11,90€</div>
                            <div class="caption">
                                <h4>Menu Double Steak</h4>
                                <p>Samdwich: Burger, Salade , Tomate,Cornichon+Frites+Boissons</p>
                                <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div> -->

                           <!--plats africains-->
                           
                       <!--    <div class="tab-pane" id="elt7">
                            <div class="row">
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/eru.jpg" alt="">
                                        <div class="price">18.90€</div>
                                        <div class="caption">
                                            <h4>Eru</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/okok.png" alt="">
                                        <div class="price">19,50€</div>
                                        <div class="caption">
                                            <h4>Okok</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/koki.jpg" alt="">
                                        <div class="price">17.90€</div>
                                        <div class="caption">
                                            <h4>Koki</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/ndole.jpg" alt="">
                                        <div class="price">14,90€</div>
                                        <div class="caption">
                                            <h4>Ndole</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>
            
                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/taro.jpg" alt="">
                                        <div class="price">11,90€</div>
                                        <div class="caption">
                                            <h4>Taro</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="images/poisson.jpg" alt="">
                                        <div class="price">11,90€</div>
                                        <div class="caption">
                                            <h4>Menu Double fish</h4>
                                            <p>Composition d'épices africaines</p>
                                            <a href="#" class="btn btn-order" role="button"><span class="glyphicon glyphicon-shopping-cart"></span>commander</a>
                                        </div>
                                    </div>
                                </div>
            
                            </div>
            
                        </div>



        </div>

    </div>  -->
    
</body>
</html>