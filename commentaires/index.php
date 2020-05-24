<?php
    date_default_timezone_set('Africa/Algiers');
        include 'comments.inc.php';
        include 'dbh.inc.php';
?>



    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laisser un commentaire</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-frontpage.css" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="choukri.css">
    </head>



    <body>   
       
       
       
       
<div class="container-fluid">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                     <form id="signin" class="navbar-form navbar-right" role="form">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                            <input id="email" type="email" class="form-control" name="email" value="" placeholder="Email Address">
                        </div>

                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" value="" placeholder="Password">
                        </div>

                                                <button type="submit" class="btn btn-primary">Login</button>
                    </form>


                    <a class="logo" href="i"><img src="logo.png" alt="" align="left" width="100px" height="100px"></a>



                    <h1 class="tagline">   BDE Exia Algerie</h1>





                </div>


            </div>

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
<br><br>
<br>
<br>
<br>
<br>
    
      <?php
        
        getPhotos($conn)
        
        ?>
       
    

        <?php
echo "<form method='POST' action='".setComments($conn)."'>
   <input type='hidden' name='uid' value='Anonymous'>
      <input type='hidden' name='date' value='".date('Y-m-d H:i:s')."'>
    <textarea name='message'></textarea><br>
    <button type='submit' name='commentSubmit' >Comment</button>
</form>";
        ?>
    
    <div class="container">
      <div class="row" id="choukri">
      <div  class="col-md-6">
       <div class="container-fluid"> 
       <div class='pull-right'>           
        <?php
    getComments($conn);
    ?>
    </div>
   </div>
   </div>
    </div>
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
        
        
    
    
    
    </body>

    </html>
