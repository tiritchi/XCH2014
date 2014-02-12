<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
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
                    <a class="navbar-brand" href=".">

                        XTrem Cergy Hunting

                    </a>
                </div>
                <div class="navbar-collapse collapse">
                    <form class="navbar-form navbar-right" action="login" method="post">
                        <div class="form-group">
                            <input class="form-control" name='email' type="text" placeholder="Email"></input>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name='password' type="password" placeholder="Password"></input>
                        </div>
                        <button class="btn btn-success" type="submit">
                            Sign in
                        </button>
                        <a class="btn btn-primary btn-sm" role="button" href="register">Sign up !</a>
                    </form>
                </div>
                <!--

                /.navbar-collapse 

                -->
            </div>
        </div>
            
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                <img src="ressources/img_1.jpg" alt="pouet">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                <img src="ressources/img_2.png" alt="pouet">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
                <div class="item">
                <img src="ressources/img_3.jpg" alt="pouet">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            </div>
        
          <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </body>
</html>