<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="icon" type="image/png" href="ressources/favicon.png" />
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>xTremCergyHunting</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="bootstrap/js/jquery.min.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
            body { padding-top: 50px; }
        </style>
    </head>
    
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <div class="container">
                <div class="navbar-header">
                    <button class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse" type="button">
                        <span class="sr-only">

                            Toggle navigation

                        </span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href=".">XTrem Cergy Hunting</a>
                    
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="#regles" data-toggle="tab">Règles</a></li>
                        <li><a href="#organisation" data-toggle="tab">Organisation</a></li>
                        <li><a href="#jeu" data-toggle="tab">Le jeu</a></li>
                        <li><a href="#news" data-toggle="tab">News</a></li>
                        <li><a href="#contact" data-toggle="tab">Contact</a></li>
                        <li><a href="#remerciements" data-toggle="tab">Remerciements</a></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Connexion</button>
                        <a class="btn btn-primary btn-sm" role="button" href="register">Sign up !</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-4">
                <a class="thumbnail">
                    <img src="ressources/home.jpg" alt="...">
                </a>
            </div>
            <div class="col-lg-8">
                <div class="page-header">
                    <h1>Example page header <small>Subtext for header</small></h1>
                </div>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="panel panel-default ">
                            <div class="panel-heading">
                                <h3 class="panel-title">Présentation</h3>
                            </div>
                            <div class="panel-body">
                                Xtrem Cergy Hunting<br>Inscrivez-vous et participez au premier streetwar de Cergy !<br>Tous les étudiants de Cergy sont invités à la plus grande chasse de l’année<br>Arrosez votre cible et gagnez des points<br><br>Soyez le dernier survivant !
                            </div>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="regles" class="tab-pane fade in active">
                            <h3>Règles</h3>
                            <h4>Conditions</h4>
                            <p>Afin de participer au jeu Xtrem Cergy Hunting, vous devez : 
                                <ul>
                                    <li>Habiter et travailler dans la zone pour vous trouverez ici (<= lien vers la carte)</li>
                                    <li>Être présent dans la zone de jeu durant la période de jeu. Les absences sont tolérées dans la mesure où elles ne dépassent pas 2 jours consécutifs et au maximum 2 jours par semaine.</li>
                                    <li>Être majeur (âgé de 18 ans ou plus)</li>
                                    <li>Fournir une photo en couleur, non modifiée ou truquée, datant de moins de 3 mois montrant distinctement votre visage de face et sans accessoire : pas de lunettes, chapeau, foulard, etc. La photo doit être prise pour montrer clairement votre visage (pas de flou, couleur des yeux visible). Les organisateurs se réservent le droit de refuser les photos proposées par les joueurs si elles ne correspondent pas aux critères, elles devront être changées avant la validation de l’inscription.</li>
                                    <li>Fournir des renseignements exacts et précis lors de votre inscription</li>
                                    <li>Signaler tout changement d'information aux organisateurs via le système de tickets mis à votre disposition dans votre espace personnel.</li>
                                    <li>Accepter sans réserve le présent règlement.</li>
                                </ul>
                            </p>
                        </div>
                        <div id="organisation" class="tab-pane fade in active">
                            <h3>Organisation</h3>
                            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                        </div>
                        <div id="jeu" class="tab-pane fade">
                            <h3>Le jeu</h3>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                        <div id="news" class="tab-pane fade">
                            <h3>News</h3>
                            <p>Vestibulum nec erat eu nulla rhoncus fringilla ut non neque. Vivamus nibh urna, ornare id gravida ut, mollis a magna. Aliquam porttitor condimentum nisi, eu viverra ipsum porta ut. Nam hendrerit bibendum turpis, sed molestie mi fermentum id. Aenean volutpat velit sem. Sed consequat ante in rutrum convallis. Nunc facilisis leo at faucibus adipiscing.</p>
                        </div>
                        <div id="contact" class="tab-pane fade in active">
                            <h3>Contact</h3>
                            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                        </div>
                        <div id="remerciements" class="tab-pane fade in active">
                            <h3>Remerciements</h3>
                            <p>Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui. Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth.</p>
                        </div>
                    </div>
                    <div class="panel-body">
                        Panel content
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">Top 5 players</h3>
                            </div>
                            <div class="panel-body">
                                <ul class="list-group">
                                   <li class="list-group-item">Best player 1 <span class="badge">5 points</span></li>
                                   <li class="list-group-item">Best player 2 <span class="badge">4 points</span></li>
                                   <li class="list-group-item">Best player 3 <span class="badge">3 points</span></li>
                                   <li class="list-group-item">Best player 4 <span class="badge">2 points</span></li>
                                   <li class="list-group-item">Best player 5 <span class="badge">1 points</span></li>
                                </ul>
                            </div>
                        </div>
>>>>>>> 9cb957af09b4765345594caadbf81facb1b64b58
                    </div>

            </div>
        </div>

        <!-- modal-->
        <form class="form-horizontal" action="login" method="post">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title" id="myModalLabel">Veuillez vous identifier</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input class="form-control" name='email' type="text" placeholder="Email"></input>
                            </div>
                            <div class="form-group">
                                <input class="form-control" name='password' type="password" placeholder="Password"></input>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button class="btn btn-success" type="submit">Connexion</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>




    </body>
</html>