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
            body { padding-top: 50px;
                background-color: #FF9900;
            }
        </style>
        <?php require('include/lib/functions.php'); ?> 
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
                        <li class="active"><a href="#accueil" data-toggle="tab">Accueil</a></li>
                        <li><a href="#regles" data-toggle="tab">Règles</a></li>
                        <li><a href="#jeu" data-toggle="tab">Le jeu</a></li>
                        <li><a href="#news" data-toggle="tab">News</a></li>
                        <li><a href="#contact" data-toggle="tab">Contact</a></li>
                        <li><a href="#remerciements" data-toggle="tab">Remerciements</a></li>
                    </ul>
                    <div class="navbar-form navbar-right">
                        <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Connexion</button>
                        <a class="btn  btn-danger btn-sm" role="button" href="register">>> Inscrivez vous <<</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class=" col-lg-4">
                <div class="thumbnail">
                    <img src="ressources/home.jpg" alt="...">
                </div>
            </div>
            <div class="col-lg-8">
                <div class="page-header">
                    <h1>XTrem Cergy Hunting <small>     1ère édition</small></h1>
                </div>
                <div class="row">                    
                    <div class="col-lg-8">
                        <div class="tab-content">
                        <div id="accueil" class="tab-pane fade in active">
                            <?php include 'include/accueil.html';?>
                        </div>
                        <div id="regles" class="tab-pane fade">
                            <?php include 'include/regles.html';?>
                        </div>
                        <div id="jeu" class="tab-pane fade">
                            <?php include 'include/le_jeu.html';?>
                        </div>
                        <div id="news" class="tab-pane fade">
                            <?php include 'include/news.html';?>
                        </div>
                        <div id="contact" class="tab-pane fade">
                            <?php include 'include/contact.html';?>
                        </div>
                        <div id="remerciements" class="tab-pane fade">
                            <?php include 'include/remerciements.html';?> 
                        </div>
                    </div>
                    </div>
                    <div class="col-lg-4">
                        <?php include 'include/top5.php';?>
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


        <div class="pull-right">
            <strong>Un évènement proposé par ENSEAventure</strong> <tab><a href="http://enseaventure.asso-ensea.net"> <img src="ressources/enseaventure.jpg" width="50"/> </a>
        </div>

    </body>
</html>