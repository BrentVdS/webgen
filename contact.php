<!DOCTYPE html>
<html lang="nl">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>WebGen</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link rel="icon" href="favicon.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#0021ff">
    <meta name="msapplication-TileColor" content="#2b5797">
    <meta name="theme-color" content="#ffffff">

  </head>

  <body class="contactreplybody">

  <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand2 js-scroll-trigger" href="./index.html#page-top"><img class="whitelogo" src="img/logos/logo_white2.png"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link2 js-scroll-trigger" href="./index.html#services">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link2 js-scroll-trigger" href="./index.html#portfolio">Portfolio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link2 js-scroll-trigger" href="./index.html#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link2 js-scroll-trigger" href="./index.html#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link2 js-scroll-trigger" href="./index.html#contact">Contact</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="contactreplyOutput">
        <div class="bedankt">
            <h1>Bedankt!</h1>
            <p>We behandelen uw inzending zo snel mogelijk</p>
        </div>
        <div class="output">
        <p>Je verstuurde volgende gegevens:</p>
            <ul>
                <li>Naam: <?php echo $_POST["gebruikersnaam"]?></li>
                <li>Email: <?php echo $_POST["email"]?></li>
                <?php
                    if (isset($_POST["feedback"]) && $_POST["feedback"] != "") {
                    			echo '<li>Opmerking:</li><div class="tekst">' . $_POST["feedback"] . '</div>';
                    }
                    // Check for empty fields
                    if(empty($_POST['gebruikersnaam'])      ||
                       empty($_POST['email'])     ||
                       !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
                       {
                       echo "<p><br>Dit is geen valide email adres</p>";
                       return false;
                       }

                    $name = strip_tags(htmlspecialchars($_POST['gebruikersnaam']));
                    $email_address = strip_tags(htmlspecialchars($_POST['email']));
                    $message = strip_tags(htmlspecialchars($_POST['feedback']));

                    // Create the email and send the message
                    $to = 'robbe.baeyens@outlook.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
                    $email_subject = "Website Contact Form:  $name";
                    $email_body = "Je hebt een nieuw bericht van je website form.\n\n"."Dit was ingevuld:\n\nNaam: $name\n\nEmail: $email_address\n\nOpmerking:\n$message";
                    $headers = "From: noreply@webgen.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
                    $headers .= "Reply-To: $email_address";
                    mail($to,$email_subject,$email_body,$headers);
                    return true;
                ?>
            </ul>
        </div>
    </div>

        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Plugin JavaScript -->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Contact form JavaScript -->
        <script src="js/jqBootstrapValidation.js"></script>
        <!--<script src="js/contact_me.js"></script>-->

        <!-- Custom scripts for this template -->
        <script src="js/agency.min.js"></script>

  </body>

</html>
