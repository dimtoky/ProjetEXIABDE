<?php
session_start();
$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';
if(!empty($sessData['status']['msg'])){
	$statusMsg = $sessData['status']['msg'];
	$statusMsgType = $sessData['status']['type'];
	unset($_SESSION['sessData']['status']);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title></title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
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
    <!-- Image Background Page Header -->
    <!-- Note: The background image is set within the business-casual.css file. -->
   
    <header class="">
    
</br></br></br></br></br>
<div class="container">
<div id="myCarousel" class="carousel slide" data-ride="carousel">
<!-- Indicators -->
<ol class="carousel-indicators">
<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
<li data-target="#myCarousel" data-slide-to="1"></li>
<li data-target="#myCarousel" data-slide-to="2"></li>
<li data-target="#myCarousel" data-slide-to="3"></li>
</ol>

<!-- Wrapper for slides -->
<div class="carousel-inner" role="listbox">

<div class="item active">
<img src="a.jpg" alt="Activitées" style="width: 100%;">
<div class="carousel-caption">
  <h3>Activitées </h3>
  <p></p>
</div>
</div>



<div class="item">
<img src="b.jpg" alt="Etudes" style="width: 100%;">
<div class="carousel-caption">
  <h3>Etudes</h3>
  <p></p>
</div>
</div>

<div class="item">
<img src="c.jpg" alt="Journées" style="width: 100%;">
<div class="carousel-caption">
  <h3>Journées des exars</h3>
  <p></p>
</div>
</div>
</div>

<!-- Left and right controls -->
<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>

<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>

</div>
</div>
    </header>

    <!-- Page Content -->
    <div class="container">

        <hr>

        <div class="row">

            <div class="col-sm-8">
                <h2>Le BDE ? </h2>
                <p>Un bureau des étudiants (BDE) ou bureau des élèves, est une association étudiantes d'une même université ou école, élue par leurs adhérents, et qui s'occupe d'organiser les activités extra-scolaires telles que des soirées étudiantes, l'accueil des nouveaux élèves, et diverses activités allant des rencontres sportives aux événements culturels, en passant par la gestion des éventuelles cafétérias ou coopératives étudiantes.</p>
                

            </div>
            <div class="col-sm-4">
                <h2>Contactez nous </h2>
                <address>
                    <strong>BDE Exia</strong>
                    <br>+213 5555 5555 555
                    <br>Tixesraine Alger
                    <br>
                </address>
                <address>
                    <abbr title="Phone">P:</abbr>(123) 456-7890
                    <br>
                    <abbr title="Email">E:</abbr> <a href="mailto:#">BDECESIEXIA.Alger@CESI.com</a>
                </address>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <div class="row">
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="gaming.png" alt="">
              <h2>Clubs</h2>
                <p>Les différents clubs que vous pouvez rejoindre</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="Gallery.png" alt="">
                <h2>Photos</h2>
                <p>photos souvenir des évenements du BDE</p>
            </div>
            <div class="col-sm-4">
                <img class="img-circle img-responsive img-center" src="Event.png" alt="">
                <h2>Evenements</h2>
                <p>Inscrivez vous a l'un des nombreux évenements organisés par le BDE</p>
            </div>
        </div>
        <!-- /.row -->

        <hr>
        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p></p>
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
