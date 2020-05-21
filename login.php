<!DOCTYPE html>
<?php session_start(); 
if(isset($_SESSION['user'])){
    header('Location: index.php');
}
?>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>My Project</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/full-width-pics.css" rel="stylesheet">

    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id))
                return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Volkswagen fan page</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contact</a>
                    </li>
                    <div class="dropdown">
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="dropdown">Car list<span class="caret"></span></a>
                            <ul class="dropdown-menu nav-item">
                                <li class="nav-link"><a href="golfIV.php">Golf IV</a></li>
                                <li class="nav-link"><a href="golfV.php">Golf V</a></li>
                                <li class="nav-link"><a href="passat.php">Passat</a></li>
                            </ul>
                    </li>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link active" href="login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('img/img.jpg');">
        <img class="img-fluid d-block" style="width: 200px; height: 200px; " src="img/login.png" alt="">
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <form method="post" action="help/login_page.php">
                <table style="margin: auto; text-align: right;">
                    <tr>
                        <td>
                            Nickname:
                        </td>
                        <td>
                            <input type="text" name="nickname" value="<?php if(isset($_COOKIE['nickname'])) {echo $_COOKIE['nickname'];}?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Password:
                        </td>
                        <td>
                            <input type="password" name="password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password'];}?>" required/>
                        </td>
                    </tr>
                    <tr>
                        <?php $a=rand()%10;$b=rand()%10;?>
                        <td>
                            <?php echo $a."+".$b;?>:
                        </td>
                        <td>
                            <input type="text" name="captcha" value="" required/>
                            <input type="hidden" name="vcapt" value="<?php echo $a+$b;?>"/> 
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="checkbox" name="remember" <?php if(!isset($_COOKIE['nickname'])) {echo 'checked';}?> /> <label>Remember me</label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <input type="submit" value="Login" style="width: 100px;"/>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <a href="register.php"><input type="button" value="Register" style="width: 100px;"/></a>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </section>



    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <p class="m-0 text-center text-font-family-sans-serif text-info">Volkswagen. Das Auto. &copy;</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>
