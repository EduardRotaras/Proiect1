<!DOCTYPE html>
<?php session_start(); ?>
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
                <span class="navbar-toggler-icon navbar-"></span>
            </button>

            <?php
            if (isset($_SESSION['user'])) {
                if ($_SESSION['admin'] > 1) {
                    echo '<font color="#8A0015"> Welcome, ' . $_SESSION["user"] . '! (admin)</font>';
                } else {
                    echo '<font color="#8A0015"> Welcome, ' . $_SESSION["user"] . '!</font>';
                }
            }
            ?>
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
                            <a class="nav-link active" data-toggle="dropdown">Car list<span class="caret"></span></a>
                            <ul class="dropdown-menu nav-item">
                                <li class="nav-link"><a href="golfIV.php">Golf IV</a></li>
                                <li class="nav-link active"><a href="golfV.php">Golf V</a></li>
                                <li class="nav-link"><a href="passat.php">Passat</a></li>
                            </ul>
                        </li>
                    </div>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['user'])) {
                            echo '<a class="nav-link" href="help/logout_page.php">Logout</a>';
                        } else {
                            echo '<a class="nav-link" href="login.php">Login</a>';
                        }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header - set the background image for the header in the line below -->
    <header class="py-5 bg-image-full" style="background-image: url('img/mk5.jpeg');">
        <img id="logo" class="img-fluid d-block mx-auto" style="width: 200px; height: 200px;" src="img/logo.png" alt="">
    </header>

    <!-- Content section -->
    <section class="py-5">
        <div class="container">
            <h1>Golf V</h1>
            <p>A cincea generatie Volkswagen Golf MK5, construit de Volkswagen Group a fost prezentată la salonul Frankfurt Motor Show în octombrie 2003 și a intrat în vânzare în Europa, o lună mai târziu. Pentru a comemora acest lucru, Wolfsburg a fost redenumit "Golfsburg" pentru o săptămână. Acesta a ajuns pe pietele din America de Nord în iunie 2006 cu emblema Rabbit reînviat. În America de Nord, SEAT și Skoda nu aveau un succes foarte mare la vânzări în timp ce Volkswagen încercă să reînvie imaginea brandului Volkswagen la adevărata sa valoare. În total au fost fabricate 5.000.777 de unități.</p>
            <h5>Pozele cu masinile celor ce ne sustin:</h5>
            <table class="table">
                <?php
                require_once 'help/imagesClass.php';
                $dbpoze = new imagesClass();
                $results = $dbpoze->getImageType('golfV');
                foreach ($results as $row) {
                    ?>
                    <tr>
                        <td style="max-width: 30%;">
                            <p>Posted by: <font color="ff0000"><?php echo $row['user']; ?></font></p>
                            <img src="<?php echo $row['path']; ?>" style="max-height: 300px; max-width: 300px;"/>
                            <?php
                            if (isset($_SESSION['user'])) {
                                if ($_SESSION['admin'] > 1) {
                                    ?>
                                    <form method="get" action="help/delete_image.php">
                                        <input type="hidden" name="model" value="golfV">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                        <input type="submit" value="Delete image">
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        </td>
                        <td>
                            <p><?php echo $row['description'] ?></p>
                        </td>
                    </tr>
                    <?php
                }
                if (isset($_SESSION['user'])) {
                    ?>
                    <tr>
                        <td>Upload a image with your car:
                            <form method="post" action="help/upload_image.php" enctype="multipart/form-data">
                                <input type="hidden" name="size" value="1000000">
                                <input type="hidden" name="user" value="<?php echo $_SESSION['user']; ?>">
                                <input type="hidden" name="model" value="golfV">
                                <div>
                                    <input type="file" name="image">
                                </div>
                                <div>
                                    <textarea name="description" cols="80" rows="3" placeholder="Description"></textarea>
                                </div>
                                <div>
                                    <input type="submit" name="upload" value="Upload Image">
                                </div>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </section>



    <!-- Footer -->
    <footer class="py-5 bg-dark">
        <div class="container">
            <div class="fb-like" data-href="https://www.facebook.com/VolkswagenRomania/" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true"></div>
            <p class="m-0 text-center text-font-family-sans-serif text-info">Volkswagen. Das Auto. &copy;</p>
        </div>
        <!-- /.container -->
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



</body>

</html>
