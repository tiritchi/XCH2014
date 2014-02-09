<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1" name="viewport"></meta>
        <title>xTremCergyHunting</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="signin.css"></link>

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
            <form class="navbar-form navbar-right" role="form">
                <div class="form-group">
                    <input class="form-control" type="text" placeholder="Email"></input>
                </div>
                <div class="form-group">
                    <input class="form-control" type="password" placeholder="Password"></input>
                </div>
                <button class="btn btn-success" type="submit">
                    Sign in
                </button>
                <a class="btn btn-primary btn-sm" role="button" href="register/register2.php">
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
        <a class="btn btn-primary btn-lg" role="button" href="register/register2.php">
            Inscrivez-vous ! »
        </a>
        </p>
    </div>
    <?php
            echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";
    ?>
    
    </body>
</html>