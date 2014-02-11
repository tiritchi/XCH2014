<!DOCTYPE html>
<!-- test -->
<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>xTremCergyHunting</title>
        <!--<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="signin.css"></link>-->
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap-theme.min.css">
        <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
        <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
        <style type="text/css">
            .bs-example{
                margin: 20px;
            }
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
                <a class="navbar-brand" href="#">

                    XTrem Cergy Hunting

                </a>
            </div>
            <div class="navbar-collapse collapse">
                <form class="navbar-form navbar-right" action="index.php?page=login" method="post">
                    <div class="form-group">
                        <input class="form-control" name='email' type="text" placeholder="Email"></input>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name='password' type="password" placeholder="Password"></input>
                    </div>
                    <button class="btn btn-success" type="submit">
                        Sign in
                    </button>
                    <a class="btn btn-primary btn-sm" role="button" href="login.php?page=register">
                	Sign up ! »
           			</a>
                </form>
            </div>
            <!--

            /.navbar-collapse 

            -->
        </div>
    </div>
        
    <div class="jumbotron">
        <h1>XTrem Cergy Hunting</h1>
        <p>
            La XTrem Cergy Hunting est un évènement trop trop cool organisé par ENSEAventure lors duquel vous devrez tuer des gens avec un pistolet à eau<br/>
            
        </p>
        <p>
        <a class="btn btn-primary btn-lg" role="button" href="index.php?page=register">
            Inscrivez-vous ! »
        </a>
        </p>
    </div>    
    </body>
</html>