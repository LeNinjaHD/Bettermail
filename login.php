<?php
session_start();
$loginrequired = false;
include_once("mysql.php");
include_once("header.inc.php");
if(isset($_GET['login'])) {
    $email = $_POST['email'] ."@leprofi.com";
    $passwort = $_POST['passwort'];

    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();

    //Überprüfung des Passworts
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['userid'] = $user['id'];
        die('<p><br><div class="alert alert-success" role="alert">Login erfolgreich. Weiter zu <a href="./">START</a></div>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>

<form action="?login=1" method="post" class="form-signin">
<div class="input-group">
<input type="text" size="40" maxlength="250" name="email" placeholder="E-Mail" class="form-control" aria-describedby="email">
<span class="input-group-addon" id="email">@leprofi.com</span>
</div>
<input type="password" size="40"  maxlength="250" name="passwort" placeholder="Passwort" class="form-control">
<input type="submit" value="Anmelden" class="btn btn-lg btn-primary btn-block">
</form>
<?php
include("footer.inc.php");
?>
