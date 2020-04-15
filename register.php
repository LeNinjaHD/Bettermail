<?php
session_start();
$loginrequired = false;
include("mysql.php");
include_once("header.inc.php");
$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll

if(isset($_GET['register'])) {
    $error = false;
    $email = $_POST['email']. "@leprofi.com";
    $passwort = $_POST['passwort'];
    $passwort2 = $_POST['passwort2'];

    if(strlen($passwort) == 0) {
        echo '<p><br><div class="alert alert-danger container" role="alert"><span class="glyphicon glyphicon-remove"></span> Bitte ein Passwort angeben/div><br>';
        $error = true;
    }
    if($passwort != $passwort2) {
        echo '<p><br><div class="alert alert-danger container" role="alert"><span class="glyphicon glyphicon-remove"></span> Die Passwörter müssen übereinstimmen</div><br>';
        $error = true;
    }

    //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
    if(!$error) {
        $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
        $result = $statement->execute(array('email' => $email));
        $user = $statement->fetch();

        if($user !== false) {
            echo '<p><br><div class="alert alert-danger container" role="alert"><span class="glyphicon glyphicon-remove"></span> Diese E-Mail-Adresse ist bereits vergeben</div><br>';
            $error = true;
        }
    }

    //Keine Fehler, wir können den Nutzer registrieren
    if(!$error) {
        $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
        $statement = $pdo->prepare("INSERT INTO users (email, passwort) VALUES (:email, :passwort)");
        $result = $statement->execute(array('email' => $email, 'passwort' => $passwort_hash));

        if($result) {
            echo '<br><p><div class="alert alert-success" role="alert"><span class="glyphicon glyphicon-ok"></span> Du wurdest erfolgreich registriert. <a href="./">Startseite</a></div>';
            $showFormular = false;
        } else {
            echo '<p><br><div class="alert alert-danger container" role="alert"><span class="glyphicon glyphicon-remove"></span> Beim Abspeichern ist leider ein Fehler aufgetreten</div><br>';
        }
    }
}

if($showFormular) {
?>
<p>
<div class="container">
<form action="?register=1" method="post" class="form-signin">
<label for="email" class="sr-only">E-Mail:</label>
<div class="input-group">
      <input type="text" size="80" maxlength="250" name="email" class="form-control" placeholder="E-Mail" required aria-describedby="email">
      <span class="input-group-addon" id="email">@leprofi.com</span>
</div>
<label for="passwort" class="sr-only">Dein Passwort:</label>
<input type="password" size="40"  maxlength="250" name="passwort" class="form-control" placeholder="Passwort" required>
<label for="passwort2" class="sr-only">Passwort wiederholen:</label>
<input type="password" size="40" maxlength="250" name="passwort2" class="form-control" placeholder="Passwort Wiederholen" required>
<input type="submit" value="Abschicken" class="btn btn-lg btn-primary btn-block">
</form>
</div>
<?php
} //Ende von if($showFormular)
include("footer.inc.php");
?>

</body>
</html>
