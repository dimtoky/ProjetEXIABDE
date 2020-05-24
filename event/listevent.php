<?php
include('connexion.php');
$DB= new DB();
session_start();


$sessData = !empty($_SESSION['sessData'])?$_SESSION['sessData']:'';

if(!empty($sessData['status']['msg'])){
	
	$statusMsg = $sessData['status']['msg'];
	
	$statusMsgType = $sessData['status']['type'];
	
	unset($_SESSION['sessData']['status']);
}


if(empty($sessData['userLoggedIn']) && empty($sessData['userID']))
{
 header("location:../registration.php");
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
    <link href="button.css" rel="stylesheet">
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

    <script>
function suggest() {
    window.open("eventsuggest.php");
}
</script>
  </head>


  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="container">
          <?php
if(!empty($sessData['userLoggedIn']) && !empty($sessData['userID'])){
	
	include '../user.php';
	
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
                  <a href="../userAccount.php?logoutSubmit=1" class="logout">Mon Compte</a>
                  <a href="../userAccount.php?logoutSubmit=1" class="account">  Se déconnecter</a>

                </div>
                <a class="logo" href="../index.php"><img src="logo.png" alt="" align="left" width="100px" height="100px"></a>
                <h1 class="tagline">   BDE Exia Algerie</h1>
              </div>
            </div>
            <?php
}

else{

?>
              <div class="row">
                <div class="col-lg-12">
                  <form id="signin" class="navbar-form navbar-right" role="form" action="userAccount.php" method="post">
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

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>


 <!-- Body -->
 <?php
    
    if(isset($_GET['idevent']))
    {      
         $uevents = $DB->query("SELECT register_event.register_id, users.first_name, users.last_name, users.email FROM register_event INNER JOIN users ON users.id=register_event.client_id WHERE register_event.event_id =".$_GET['idevent']."");
         $events = $DB->query("SELECT `nom_event` FROM `event` where id = ".$_GET['idevent']."");
       
    }
      ?>

      
  

<div class="container">
  <h2>Liste participants evenement <?php echo $events[0]->nom_event;?></h2>
         
  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Premon</th>
        <th>Email</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($uevents as $event ) : ?>
      <tr>
        <td><?php echo $event->register_id; ?></td>
        <td><?php echo $event->first_name; ?></td>
        <td><?php echo $event->last_name; ?></td>
        <td><?php echo $event->email; ?></td>
      </tr>
        <?php endforeach ?>
    </tbody>
  </table>
</div>


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