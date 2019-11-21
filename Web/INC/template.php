<!DOCTYPE html>
<html lang="en">
<html lang="en" id="quiSommesNous">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MANAGIS</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

    <!-- Bootstrap core CSS -->
    <!--<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">-->
    <!-- Material Design Bootstrap -->
    <!--<link href="CSS/mdb.min.css" rel="stylesheet">-->

    <!-- Your custom styles (optional) -->
    <link href="CSS/style2.css" rel="stylesheet">


    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="CSS/agency.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="IMG/favicon.png" />

    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="JS/popper.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="JS/mdb.min.js"></script>
    <script type="text/javascript" src="JS/main.js"></script>



</head>

<body id="page-top">

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Managis</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
            <?php
            $services =
                '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#services">Services</a>
          </li>';
            $quiSommesNous =
                '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#team">L\'équipe</a>
          </li>';
            $connexion =
                '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" id="connexion" href="connexion.php">Connexion</a>
            <a class="nav-link js-scroll-trigger" href="connexion.php">Connexion</a>
          </li>' ;
            $aProposDeNous =
                '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#about">A propos de nous</a>
          </li>';
            $contact =
                '<li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>';
            $vosEvenements =
                '<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle btn btn-outline-light" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span class="glyphicon glyphicon-calendar"></span> Gestion des événements
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="addEvent.php">CREER VOTRE EVENEMENT</a>
                              <a class="dropdown-item" href="vosEvenements.php">EVENEMENTS A VENIR</a>
                              <a class="dropdown-item" href="historiqueEvents.php">HISTORIQUE DE VOS EVENEMENTS</a>
                            </div>
                </li>';
            if (!empty($_SESSION['user'])) {
                //$ajouterEvent = str_replace("<a href=\"inscription.php\" class=\"btn btn-outline-dark\">Inscription</a>", '<a href="addEvent.php"  class="btn btn-outline-dark">Créer votre evenement </a>', $inscription);
                $espaceMembre = str_replace("<a class=\"nav-link js-scroll-trigger\" id=\"connexion\" href=\"connexion.php\">Connexion</a>", "<a href=\"espaceMembre.php\" id=\"espaceMembre\" class=\"nav-link js-scroll-trigger\">Gestion de  compte</a>", $connexion);
                $deconnexion= str_replace("<a class=\"nav-link js-scroll-trigger\" href=\"#team\">L'équipe</a>", "<a href=\"deconnexion.php\" id=\"deconnexion\" class=\"nav-link js-scroll-trigger\"> Déconnexion</a>", $quiSommesNous);
                $espaceMembre = str_replace("<a class=\"nav-link js-scroll-trigger\" href=\"connexion.php\">Connexion</a>", "<a href=\"espaceMembre.php\" class=\"nav-link js-scroll-trigger\">Gestion de  compte</a>", $connexion);
                $deconnexion= str_replace("<a class=\"nav-link js-scroll-trigger\" href=\"#team\">L'équipe</a>", "<a href=\"deconnexion.php\" class=\"nav-link js-scroll-trigger\"> Déconnexion</a>", $quiSommesNous);
                echo $vosEvenements  . $espaceMembre . $deconnexion;
            }
            else {
                echo $services . $aProposDeNous . $quiSommesNous . $contact . $connexion;
            }
            ?>

        </ul>
      </div>
    </div>
  </nav>



  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">

              <div class="intro-lead-in">Bienvenue sur Managis</div>
              <div class="intro-heading text-uppercase">Organisez au mieux vos événements! </div>
              <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Commencez dès maintenant !</a>
          </div>
    </div>
  </header>

<div id="difSection">
  <!-- Services -->
  <section class="bg-white page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Services</h2>
          <h3 class="section-subheading text-muted">Nous vous accompagnons lors de l'organisation de vos événements.</h3>
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-plus fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Créez vos événements</h4>
          <p class="text-muted">Préparez votre soirée au mieux en invitant tous vos amis tout en leur partageant les informations nécessaires pour le bon déroulement de celui-ci.</p>
        </div>
        <div class="col-md-6">
          <span class="fa-stack fa-4x">
            <i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-eye fa-stack-1x fa-inverse"></i>
          </span>
          <h4 class="service-heading">Checkez vos événements</h4>
          <p class="text-muted">Recevez toutes vos invitations et regardez ce dont l'hôte a besoin pour son événement.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section class="bg-light page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">A propos de nous</h2>
          <h3 class="section-subheading text-muted">Comment en sommes-nous arrivé là?</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Septembre 2019</h4>
                  <h4 class="subheading">Notre commencement</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Nous sommes des étudiants en 3eme technologie de l'informatique à l'EPHEC de Louvain-La-Neuve. Dans le cadre de notre cours de projet d'intégration, nous avons comme tâche d'effectuer un projet qui nous serait utile dans la vie de tous les jours</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4>Mi-Septembre 2019</h4>
                  <h4 class="subheading">L'idée!</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Lors de notre voyage de fin d'étude nous sommes passé par l'étape d'organisation. C'est alors que nous nous sommes dit que nous allions créer une plateforme afin de faciliter cette tâche!</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Rejoignez-
                  <br>notre
                  <br>PROJET!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-white page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Notre équipe !</h2>
          <h3 class="section-subheading text-muted">Voici l'équipe qui a travaillé sur ce projet.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/adri.png" alt="">
            <h4>Adrien Chellé</h4>
            <p class="text-muted">Product owner/Dev App</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/nico.png" alt="">
            <h4>Nicolas Viroux</h4>
            <p class="text-muted">Dev App/Admin</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/ibra.png" alt="">
            <h4>Ibrahima Conde</h4>
            <p class="text-muted">Dev App/Admin</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/dominik.png" alt="">
            <h4>Dominik Fiedorczuk</h4>
            <p class="text-muted">Chef Dev Web</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/Maxime.png" alt="">
            <h4>Maxime Liber</h4>
            <p class="text-muted">Dev Web</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/remy.png" alt="">
            <h4>Rémy Vase</h4>
            <p class="text-muted">Dev Web</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="team-member">
            <img class="mx-auto rounded-circle" src="img/team/ambroise.png" alt="">
            <h4>Ambroise Mostin</h4>
            <p class="text-muted">Scrum Master/Dev App</p>
            <ul class="list-inline social-buttons">
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-twitter"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-facebook-f"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fab fa-linkedin-in"></i>
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contactez-nous</h2>
          <h3 class="section-subheading text-muted">Un soucis ? Nous sommes là pour répondre à vos questions.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate" method="post" action="validation.php">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" name="name" id="name" type="text" placeholder="Votre nom *" required="required" data-validation-required-message="Veuillez entrer votre prénom.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" name="email" id="email" type="email" placeholder="Votre email *" required="required" data-validation-required-message="Veuillez entrer votre adresse email.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" name="message" id="message" placeholder="Votre message *" required="required" data-validation-required-message="Veuillez entrer votre message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Envoyer</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- Footer -->
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-4">
          <span class="copyright">Managis Website</span>
        </div>
        <div class="col-md-4">
          <ul class="list-inline social-buttons">
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-twitter"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-facebook-f"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a href="#">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </li>
          </ul>
        </div>
        <div class="col-md-4">
          <ul class="list-inline quicklinks">
            <li class="list-inline-item">
              <a href="#">Privacy Policy</a>
            </li>
            <li class="list-inline-item">
              <a href="#">Terms of Use</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </footer>

  <!-- Portfolio Modals -->

  <!-- Modal 1 -->
  <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/01-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Threads</li>
                  <li>Category: Illustration</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 2 -->
  <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/02-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Explore</li>
                  <li>Category: Graphic Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 3 -->
  <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/03-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Finish</li>
                  <li>Category: Identity</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 4 -->
  <div class="portfolio-modal modal fade" id="portfolioModal4" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/04-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Lines</li>
                  <li>Category: Branding</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 5 -->
  <div class="portfolio-modal modal fade" id="portfolioModal5" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/05-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Southwest</li>
                  <li>Category: Website Design</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal 6 -->
  <div class="portfolio-modal modal fade" id="portfolioModal6" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="close-modal" data-dismiss="modal">
          <div class="lr">
            <div class="rl"></div>
          </div>
        </div>
        <div class="container">
          <div class="row">
            <div class="col-lg-8 mx-auto">
              <div class="modal-body">
                <!-- Project Details Go Here -->
                <h2 class="text-uppercase">Project Name</h2>
                <p class="item-intro text-muted">Lorem ipsum dolor sit amet consectetur.</p>
                <img class="img-fluid d-block mx-auto" src="img/portfolio/06-full.jpg" alt="">
                <p>Use this area to describe your project. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Est blanditiis dolorem culpa incidunt minus dignissimos deserunt repellat aperiam quasi sunt officia expedita beatae cupiditate, maiores repudiandae, nostrum, reiciendis facere nemo!</p>
                <ul class="list-inline">
                  <li>Date: January 2017</li>
                  <li>Client: Window</li>
                  <li>Category: Photography</li>
                </ul>
                <button class="btn btn-primary" data-dismiss="modal" type="button">
                  <i class="fas fa-times"></i>
                  Close Project</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/agency.min.js"></script>

</body>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>MANAGIS WEBSITE</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="CSS/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="CSS/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="CSS/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="IMG/favicon.png" />

    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="JS/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="JS/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="JS/mdb.min.js"></script>
    <script type="text/javascript" src="JS/main.js"></script>
</head>

<body>

<header>
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" id="barreblanche">
        <div class="container-fluid">
            <!-- Navbar brand -->
            <a class="navbar-brand" href="#">MANAGIS</a>

            <!-- Collapse button -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
                    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapsible content -->
            <div class="collapse navbar-collapse" id="basicExampleNav">

                <ul class="navbar-nav ml-auto">
                   <?php
                        $inscription =
                            '<li class="nav-item active">
                                <a href="inscription.php" class="btn btn-outline-dark">Inscription</a>
                            </li>';
                        $connexion =
                            '<li class="nav-item">
                                <a href="connexion.php" class="btn btn-outline-dark">Connexion</a>
                            </li>' ;
                        $quiSommesNous =
                            '<li class="nav-item">
                                <a href="quiSommesNous.php" class="btn btn-outline-dark">Qui sommes-nous?</a>
                            </li>';
                        $vosEvenements =
                            '<li class="nav-item">
                                <a href="vosEvenements.php" class="btn btn-outline-dark">Vos evenements</a>
                            </li>';
                        if (!empty($_SESSION['user'])) {
                            $ajouterEvent = str_replace("<a href=\"inscription.php\" class=\"btn btn-outline-dark\">Inscription</a>", '<a href="addEvent.php"  class="btn btn-outline-dark">Créer votre evenement </a>', $inscription);
                            $espaceMembre = str_replace("<a href=\"connexion.php\" class=\"btn btn-outline-dark\">Connexion</a>", "<a href=\"espaceMembre.php\" class=\"btn btn-outline-dark\">Espace Membre</a>", $connexion);
                            $deconnexion= str_replace("<a href=\"quiSommesNous.php\" class=\"btn btn-outline-dark\">Qui sommes-nous?</a>", "<a href=\"deconnexion.php\" class=\"btn btn-outline-dark\">Deconnexion</a>", $quiSommesNous);
                            echo $ajouterEvent. $vosEvenements  . $espaceMembre . $deconnexion;
                        }
                        else {
                            echo $inscription . $connexion . $quiSommesNous;
                        }
                   ?>
                </ul>
                <!-- Links -->
            </div>
        </div>
        <!-- Collapsible content -->

    </nav>
    <!--/.Navbar-->
    <div id="intro" class="container-fluid"></div>

</header>

<main class="container-fluid colormain">
    <div class="row">
        <div class="col-md-4 marge">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/managis.png" height="200px" width="200px"align="center">

            <h2 align="center">Qu'est ce que Managis ?</h2>
            <p align="center">
                <br>
                Il s'agit d'une application servant à savoir qui apporte quoi lors de vos événements.<br>
                Finit de se retrouver en manque d'alcool ou bien de chips en soirée !<br>
                Prévoyez tout à l'avance et tout ce passera pour le mieux !<br>
            </p>
        </div>
        <div class="col-md-4 marge ">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/soireAmis.jpg" height="200px" width="200px"align="center">
            <h2 align="center">Pourquoi l'utiliser ?</h2>
            <p align="center">
                <br>
                Enormément de possibilités !<br>
                Un voyage entre amis, une soirée, une excursion, une raclette ?<br>
                Managis sera le partenaire essentiel de la plupart de vos événements !
            </p>
        </div>
        <div class="col-md-4 marge">
            <img class="rounded mx-auto d-block marge rounded-circle" src="IMG/avantage.jpeg" height="200px" width="200px" align="center">

            <h2 align="center">Le petit plus!</h2>
            <p align="center">
                <br>
                Finis de jeter vos restes ! Mettez les dans un panier pour votre prochain événement !<br>
                De plus nous offrons un système de covoiturage ce qui évite d'avoir 5 voitures de 1 personnes pour la soirée !<br>
                Devenez plus éco-responsable en vous amusant !<br>
            </p>
        </div>
    </div>
</main>

<!-- Footer -->
<footer class="page-footer font-small grey darken-1 fixed-bottom container-fluid">

    <!-- Footer Elements -->
    <div class="container-fluid">
        <!-- Grid row-->
        <div class="row">
            <!-- Grid column -->
            <div class="col-md-12 py-1 ">
                <div class="mb-1 flex-center textfont"><span class ="espace">Retrouvez-nous sur :</span>
                    <!-- Facebook -->
                    <a class="fb-ic">
                        <i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                    <!-- Twitter -->
                    <a class="tw-ic">
                        <i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>

                    <a class="mail-ic">
                        <i class="far fa-envelope fa-lg white-text mr-md-5 mr-3 fa-2x"></i>
                    </a>
                </div>
            </div>
            <!-- Grid column -->
        </div>
        <!-- Grid row-->
    </div>
    <!-- Footer Elements -->

</footer>
<!-- Footer -->

</body>


</html>
