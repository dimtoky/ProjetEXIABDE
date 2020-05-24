<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
	$statusMsg = $sessData['status']['msg'];
	$statusMsgType = $sessData['status']['type'];
	unset($_SESSION['sessData']['status']);
}
?>
<?php include('connexion.php');
include ('Panier.class.php');
$DB= new DB();
$Panier= new Panier();
?>



<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Boutique du BDE</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
     <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
        <div class="container">
             <?php
        if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
	include 'user.php';
	$user = new User();
	$conditions['where'] = array(
	                'id' => $sessData['userID'],
	            );
	$conditions['return_type'] = 'single';
	$userData = $user->getRows($conditions);
	?>

  
  
     <div class="row">
                <div class="col-lg-12">
                   
                  
                    <div class="navbar-form navbar-right">
                        <h2 class="tagline">Bonjour <?php echo $userData['first_name'];
?>!</h2>
 <a href="userAccount.php?logoutSubmit=1" class="logout">Mon Compte</a>   
    <a href="userAccount.php?logoutSubmit=1" class="account">  Se déconnecter</a>  
    
                    </div>
    <a class="logo" href="i"><img src="logo.png" alt="" align="left" width="100px" height="100px"></a>
                    <h1 class="tagline">   BDE Exia Algerie</h1>
                </div>
            </div>
    <?php
}
else{
?>
            <div class="row">
                <div class="col-lg-12">
                     <form id="signin" class="navbar-form navbar-right" role="form" action="userAccount.php" method="post" >
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
                        </div>
                                               <button type="submit" class="btn btn-primary" name="loginSubmit" value="LOGIN">Login</button>
                                                <p style="color:white;">Vous n'avez pas de compte?  <a href="registration.php">  S'inscrire</a></p>
                    </form>
                   <a class="logo" href="i"><img src="logo.png" alt="" align="left" width="100px" height="100px"></a>
                    <h1 class="tagline">   BDE Exia Algerie</h1>
                </div>
            </div>
   <?php
}
?>
        </div>

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
               <li>
                       <a href="/exiabde2/index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Clubs</a>
                    </li>
                    <li>
                        <a href="/exiabde2/event/event.php">Evenements</a>
                    </li>
                    <li>
                        <a href="/exiabde2/Galerie/galerienuit.php">Galerie Photos</a>
                    </li>
                    <li>
                        <a  href="/exiabde2/Boutique/index.php">Boutique</a>
                    </li>




                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>    
    </header>

                      <!--- END HEADER-->
 <br>
<br>
 <br>
<br>
    

      <nav class="navig-boutique">
      <br>
      <h2 class="categories">Catégories</h2>
     <ul>
    <li><a href="TShirtSweat.php">T-shirts Sweatshirt</a></li>
    <li><a href="portesclefs.php">Portes clés</a></li>
    <li><a href="autocollants.php">Autocollants</a></li>
    <li><a href="panier.php">Panier</a></li>
                   </ul>
        </nav>

        
        <!---    <div class="container-items"> -->

    <div class="gallery">

    <?php $products = $DB->query('SELECT * FROM products WHERE id IN (5, 6, 7,8)'); ?>
      <?php foreach ($products as $product ) : ?>

        <div class="produit">

        <img   src="images/<?php echo $product->id; ?>.png" alt="Item<?php echo $product->name; ?>"> <br>

        <span class="infos">
          <?php echo $product->name; ?>  <br>
         prix :<?php echo $product->prix; ?> DZD
        </span>
         
        <br>

        <a class="Add" href="addPanier.php?id=<?= $product->id; ?>"> Ajouter au panier</a>
        </div>

      <?php endforeach ?>
        
        
     
    </div>
  </div>
  <!--- END BODy-->
<!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <div class="col-sm-4">
                <h2>Contactez nous </h2>
                <address>
                    <strong>BDE Exia</strong>
                    <br>+213 5555 5555 555
                    <br>Tixesraine Alger
                    <br>
                    <abbr title="Phone">Phone :</abbr>(123) 456-7890  <br>   
                    <abbr title="Email">E-mail :</abbr> <a href="mailto:#">BDECESIEXIA.Alger@CESI.com</a>
                </address>
            </div>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
        
