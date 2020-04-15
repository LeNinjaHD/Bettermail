<?php
session_start();
$loginrequired = false;
include("header.inc.php");
?>
<div class="container"><div class="jumbotron">
<h1>Wilkommen bei <b>LeProfi BetterMail!</b></h1><p>
<h3><b><span class="glyphicon glyphicon-info-sign"></span> WICHTIG:</b> Dieser Service befindet sich in der Beta Phase!</h3><p><br>
<p>Mit BetterMail kannst du verschlüsselte E-Mails an deine Freunde senden. Du benötigst dazu nur einen <a href="register.php">Account</a>.</p>
</div></div>
<?php
include("footer.inc.php");
?>
