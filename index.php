<!DOCTYPE html>
    <html>
        <head>

            <title>Login</title>
            <!--Import Google Icon Font-->
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
            <!--Import materialize.css-->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
            <link type="text/css" rel="stylesheet" href="css/style.css"  media="screen,projection"/>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

        </head>

        <body>
            <div class = "row">
                <div class = "col s12 m12 l12 center-in">
                    <h1 class = "inline">Enter Password</h1>
                    <h3 class = "inline">to</h3>
                    <h1 class = "inline">Log In</h1>
                </div> <!-- col -->
            </div> <!-- row -->

            <div class = "row password-top-pad">
                <div class="col s4 m4 l4"></div>
                <div class="input-field col s4 m4 l4 no-top-marg">
                    <input id="cred" type="password" class="inline validate">
                    <label for="cred">Password</label>
                </div>
                <div class="col s2 m2 l2">
                    <a id = "login-button" class="waves-effect waves-light btn-small">Login<i class="material-icons left">arrow_forward</i></a>
                </div>                
                <div class="col s2 m2 l2">
                    
                </div>
            </div> <!-- row -->

            <?php include('modals/create-success.php'); ?>

            <!--JavaScript at end of body for optimized loading-->
            <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            <script src="js/functions.js"></script>
        </body>
    </html>