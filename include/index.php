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
                        <li><a href="#jeu" data-toggle="tab">Le jeu</a></li>
                        <li><a href="#news" data-toggle="tab">News</a></li>
                        <li><a href="#news" data-toggle="tab">Contact</a></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Connexion</button>
                        <a class="btn btn-primary btn-sm" role="button" href="register">Insciption</a>
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
                    <h1>XTrem Cergy Hunting<small>    1ère édition</small></h1>
                </div>
                <div class="row">
                    <div class="panel panel-default col-lg-8">
                        <div class="panel-heading">
                            <h3 class="panel-title">Présentation</h3>
                        </div>
                        <div class="panel-body">
                            Xtrem Cergy Hunting<br>Inscrivez-vous et participez au premier streetwar de Cergy !<br>Tous les étudiants de Cergy sont invités à la plus grande chasse de l’année<br>Arrosez votre cible et gagnez des points<br><br>Soyez le dernier survivant !
                        </div>
                    </div>
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