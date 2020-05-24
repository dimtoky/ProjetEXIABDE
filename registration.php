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
    <link href="css/bootstrap.min.css" rel="stylesheet">

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
    <h2>Welcome <?php echo $userData['first_name'];
?>!</h2>
    <a href="userAccount.php?logoutSubmit=1" class="logout">Logout</a>
    <div class="col-lg-12">
        <p><b>Name: </b><?php echo $userData['first_name'].' '.$userData['last_name'];
?></p>
        <p><b>Email: </b><?php echo $userData['email'];
?></p>
        <p><b>Phone: </b><?php echo $userData['phone'];
?></p>
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
                    <p style="color:white;">Vous n'avez pas de compte? <a href="registration.php">  S'inscrire</a></p>
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
                        <a href="index.php">Accueil</a>
                    </li>
                    <li>
                        <a href="#">Clubs</a>
                    </li>
                    <li>
                        <a href="event/event.php">Evenements</a>
                    </li>
                    <li>
                        <a href="Galerie/GalerieNuit.php">Galerie Photos</a>
                    </li>
                    <li>
                        <a href="#">Boutique</a>

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

<br><br><br><br><br>



<div class="container">
    <h2>INSCRIPTION</h2>
    <?php echo !empty($statusMsg)?'<p class="'.$statusMsgType.'">'.$statusMsg.'</p>':'';
?>
    <div class="regisFrm">
        <form action="userAccount.php" method="post">
             <div class="form-group">
      <label for="email">Nom:</label>
      <input  class="form-control" type="text" name="first_name" placeholder="Entrez votre Nom" required="">
    </div>
     <div class="form-group">
      <label for="email">Prénom:</label>
    <input  class="form-control" type="text" name="last_name" placeholder="Entrez votre Prénom" required="">
    </div>
     <div class="form-group">
      <label for="email">Email:</label>
      <input  class="form-control" type="email" name="email" placeholder="Entrez votre Adresse Mail" required="">
    </div>
     <div class="form-group">
      <label for="email">Telephone:</label>
    <input  class="form-control" type="text" name="phone" placeholder="Entrez votre Numéro de téléphone" required="">
    </div>
     <div class="form-group">
      <label for="email">Mot de passe:</label>
      <input  class="form-control" type="password" name="password" placeholder="Entrez votre Mot de passe" required="">
    </div>
     <div class="form-group">
      <label for="email">Confirmer mot de passe:</label>
      <input  class="form-control" type="password" name="confirm_password" placeholder="Entrez à nouveau votre Mot de passe" required="">
    </div>
     <div class="form-group">
      <label for="email">Code Compte CESI/BDE</label>
      <input  class="form-control" type="password" name="role" placeholder="Laissez vide si utilisateur simple" >
    </div>

     <button type="submit" name="signupSubmit" class="btn btn-default">Submit</button>

       <!--     <input type="text" name="first_name" placeholder="FIRST NAME" required="">
            <input type="text" name="last_name" placeholder="LAST NAME" required="">
            <input type="email" name="email" placeholder="EMAIL" required="">
            <input type="text" name="phone" placeholder="PHONE NUMBER" required="">
            <input type="password" name="password" placeholder="PASSWORD" required="">
            <input type="password" name="confirm_password" placeholder="CONFIRM PASSWORD" required="">
            <div class="send-button">
                <input type="submit" name="signupSubmit" value="CREATE ACCOUNT">
            </div>-->
        </form>
    </div>
</div>




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
