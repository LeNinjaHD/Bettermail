<?php
session_start();
$loginrequired = true;
include("header.inc.php");
include("mysql.php");
if(isset($_GET['id'])) {
  $statement = $pdo->prepare("SELECT email FROM users WHERE id=?");
  $statement->execute(array($userid));
  while ($row = $statement->fetch()) {
    $email = $row['email'];
  }
  $statement = $pdo->prepare("SELECT * FROM mails WHERE id=?");
  $statement->execute(array($_GET['id']));
  while ($row = $statement->fetch()) {
    if($row['mailto'] == $email) {
      echo '<div class="container"><h2>E-Mail Eintrag #'.$row['id'].'</h2><textarea readonly cols="35" rows="10">'.$row['text'].'</textarea></div>';
    } else {
        echo '<div class="alert alert-danger" role="alert"><b><span class="glyphicon glyphicon-remove"></span></b> Diese E-Mail ist nicht an dich gerichtet!</div>';
    }
  }
}
?>
