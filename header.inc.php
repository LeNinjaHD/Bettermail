<!DOCTYPE html>
<html lang="de">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Die 3 Meta-Tags oben *müssen* zuerst im head stehen; jeglicher sonstiger head-Inhalt muss *nach* diesen Tags kommen -->
    <meta name="description" content="Mit BetterMail können sie einfach Sichere E-Mails versenden!">
    <meta name="author" content="LeNinjaHD">
    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
<link rel="icon" type="image/png" sizes="192x192"  href="/android-icon-192x192.png">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
<link rel="manifest" href="/manifest.json">
<meta name="msapplication-TileColor" content="#ffffff">
<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
<meta name="theme-color" content="#ffffff">

    <title>LeProfi BetterMail</title>

    <!-- Bootstrap-CSS -->
    <link href="./css/bootstrap.css" rel="stylesheet">

    <!-- Besondere Stile für diese Vorlage -->
    <link href="./css/header.css" rel="stylesheet">
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/footer.css" rel="stylesheet">

    <script data-ad-client="ca-pub-7367394235838935" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

    <!-- Unterstützung für Media Queries und HTML5-Elemente in IE8 über HTML5 shim und Respond.js -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <?php
    $logged_in = "";
    if(!isset($_SESSION['userid'])) {
      $logged_in = false;
    } else {
      $logged_in = true;
      //Abfrage der Nutzer ID vom Login
      $userid = $_SESSION['userid'];
    }
    ?>
    <!-- Fixierte Navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Navigation ein-/ausblenden</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="https://leprofi.com/">LeProfi</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="./">Start</a></li>
			<li><a href="sendmail.php"><span class="glyphicon glyphicon-envelope"></span> E-Mail</a></li>
                <li><a href="mail.php"><span class="glyphicon glyphicon-inbox"></span> Postfach</a></li>
				<li><a href="./forum/"><span class="glyphicon glyphicon-comment"></span> Forum</a></li>
            <li class="dropdown">
              <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mehr <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="impressum.php"><span class="glyphicon glyphicon-info-sign"></span> Impressum & Datenschutzerklärung</a></li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['userid'])) {
              ?>
              <li><a href="settings.php">Einstellungen <span class="glyphicon glyphicon-user"></span></a></li>
              <li><a href="logout.php">Abmelden <span class="glyphicon glyphicon-off"></span></a></li>
              <?php
            } else {
              ?>
              <li><a href="register.php">Registrieren <span class="glyphicon glyphicon-user"></span></a></li>
              <li><a href="login.php">Anmelden <span class="glyphicon glyphicon-log-in"></span></a></li>
              <?php
            }
            ?>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav><p>
      <?php
      if(!(isset($die))) {
        $die = true;
      }
      if($loginrequired == true) {
      if ($logged_in == false) {
        if($die == true) {
          die('<p><br><div class="container"><h4><b>Bitte zuerst <a href="login.php">einloggen</a></b></h4></div>');
        } else {
        echo('<p><br><div class="container"><h4><b>Bitte zuerst <a href="login.php">einloggen</a></b></h4></div>');
      }}
    }
      ?>
