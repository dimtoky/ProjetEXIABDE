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
 <div id="body">
<div class="container">
  <div class="jumbotron">
 <h1>Evénements du BDE</h1>  
</div>

      <div id="currentevent" class="panel panel-danger" >
 <div class="panel-heading"> 
 <h2 >Evenement en cours</h2>
  <!-- Bouton gestion -->
  
     <?php
if ($sessData['role']['level'] == 2 || $sessData['role']['level'] == 3) : ?>
 <div class="text-right">
 <form action = "addevent.php">
   <button type="submit" class="btn btn-success btn-lg">Ajouter Evenement</button>
 </form>
            
        </div>
 <?php endif; ?>
 </div>

       
 <div class="panel-body">

        <div class="row">
  <?php
    if(isset($_POST['deletesubmit']))
    { 
        $query = 'DELETE FROM event WHERE id ='.$_POST['deletesubmit'];
        $DB->insert($query);?>
        <h2 style="color:red">Evenement Supprimé</h2>
        <?php
    }
    ?>
<?php $events = $DB->query('SELECT * FROM event'); ?>
      <?php foreach ($events as $event ) : ?>  

          <div class="col-sm-3" >
            <div class="thumbnail">
              <img src="eventimg/<?php echo $event->img_event; ?>" alt="Generic placeholder thumbnail" width="300"  >
            </div>

            <div class="caption">
              <h3><?php echo $event->nom_event; ?></h3>
                 <?php
              $html2 = "listevent.php?idevent=".$event->id ;
              ?>
                <a href="<?php echo $html2 ?>" class="btn btn-info" role="button">
        Liste des participants
        </a>
              <p><?php echo $event->resume_event; ?></p>
  <p>Date :
                  <?php echo $event->date_event; ?>
                </p>
                
              <p>
              <div class ="row">
                
             
              <?php
              $html = "modifyevent.php?idevent=".$event->id ;
              ?>
                <a href="<?php echo $html ?>" class="btn btn-warning" role="button">
        Modifier
        </a>
        
         <form class="col-sm-5" action = "manageevent.php?" method="post">
   <button type="submit" name = "deletesubmit" value = "<?php echo $event->id?>" class="btn btn-danger">Supprimer</button>
 </form>
           </div>

              
                  <p>Prix:
                  <?php
                  if ($event->prix_event ==0)                  
                    echo "Gratuit";
                  else
                  {
                   echo $event->prix_event; 
                   echo " Dinars";
                  }
                   ?>
                </p>
              </p>

            </div>
          </div>
    <?php endforeach ?>

        </div>
        <div class="col-sm-6 col-md-3">

        </div>
</div>
      </div>








          <div id="nextevent" class="panel panel-warning">
            <div class="panel-heading">
              <h2>Evenement à Venir</h2>

        

                  <div class="text-right">


  
                  </div>
            </div>


            <div class="panel-body">
      
    
    
    

              <div class="row">
               
                  <?php $events = $DB->query('SELECT * FROM eventvote');
                      ?>
                    <?php foreach ($events as $event ) : ?>

                      <div class="col-sm-4">
                        <div class="thumbnail">
                         
                            <img src="eventimg/<?php echo $event->img_event; ?>" alt="Generic placeholder thumbnail" width="300">
                          
                        </div>

                        <div class="caption">
                          <h3><?php echo $event->nom_event; ?></h3>
                          <p>
                            <?php echo $event->resume_event; ?>
                          </p>
                          <p>Date :
                            <?php echo $event->date_event; ?>
                          </p>
   <?php
              $html3 = "modifyvote.php?idevent=".$event->id ;
              ?>
                <a href="<?php echo $html3 ?>" class="btn btn-warning" role="button">
        Modifier
        </a>
                          <p style="color:green">Nombre de Votes :
                            <?php echo $event->NbVote; ?>
                          </p>

                        </div>
                      </div>
                      <?php endforeach ?>

              </div>

            </div>
            <div class="row">
            
            
             
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