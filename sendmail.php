<?php
session_start();
$loginrequired = true;
include("header.inc.php");
include("mysql.php");
$showFormular = true;
if(isset($_GET['send'])) {
  $showFormular = false;
  $statement = $pdo->prepare("SELECT email FROM users WHERE id=?");
  $statement->execute(array($userid));
  while ($row  = $statement->fetch()) {
    $from = $row['email'];
  }
  $to = $_POST['to'];
  $subject = $_POST['subject'];
  $text = $_POST['text'];
  $statement = $pdo->prepare("INSERT INTO mails (mailfrom, mailto, subject, text) VALUES (?, ?, ?, ?)");
  $statement->execute(array($from, $to, $subject, $text));
}
if($showFormular) {
?>
<div class="container">
<form class="form-signin" action="?send=1" method="post">
  <h2 class="form-signin-heading">E-Mail Senden</h2>
  <label for="to" class="sr-only">An</label>
  <input type="email" id="to" name="to" class="form-control" placeholder="Empfänger" required>
  <label for="subject" class="sr-only">Betreff</label>
  <input type="text" maxlength="25" placeholder="Betreff" class="form-control" name="subject"><br>
  <label for="msg" class="sr-only">Text</label>
  <textarea maxlength="1000" name="text" required placeholder="Nachricht" class="form-control"></textarea><br>
  <button class="btn tbn-lg btn-primary btn-block" type="submit">E-Mail Senden</button>
</form>
</div>
<?php
} else {
?>
<div class="container">
  <p><b>E-Mail wurde gesendet!</b></p>
  <a href="./">Start</a>
</div>
<?php
}
include("footer.inc.php");
?>
