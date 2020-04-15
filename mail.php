<?php
session_start();
$loginrequired = true;
include("header.inc.php");
include("mysql.php");
if(isset($_GET['delete'])) {
  $id = $_GET['delete'];
  $statement = $pdo->prepare("SELECT email FROM users WHERE id=?");
  $statement->execute(array($userid));
  while ($row  = $statement->fetch()) {
    $email = $row['email'];
  }
  $statement = $pdo->prepare("SELECT * FROM mails WHERE id=?");
  $statement->execute(array($id));
  while ($row  = $statement->fetch()) {
    $mailid = $row['id'];
    $subject = $row['subject'];
    $mailemail = $row['mailto'];
  }
  if($mailemail == $email) {
    $statement = $pdo->prepare("DELETE FROM mails WHERE id=?");
    $statement->execute(array($mailid));
  } else {
    echo '<div class="alert alert-danger" role="alert"><b><span class="glyphicon glyphicon-remove"></span></b> Diese E-Mail ist nicht an dich gerichtet!</div>';
  }
}
?>
<div class="container">
<h2>Dein E-Mail Postfach</h2>
<div class="col-md-6">
  <table class="table">
    <thead>
      <tr>
        <th>Absender</th>
        <th>Betreff</th>
        <th>Nachricht</th>
        <th>Aktion</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $statement = $pdo->prepare("SELECT email FROM users WHERE id=?");
      $statement->execute(array($userid));
      while ($row  = $statement->fetch()) {
        $to = $row['email'];
      }
      $statement = $pdo->prepare("SELECT * FROM mails WHERE mailto=?");
      $statement->execute(array($to));
      while ($row  = $statement->fetch()) {
        echo '<tr><td>'.$row['mailfrom'].'</td>';
        echo'<td>'.$row['subject'].'</td>';
        $textlength = strlen($row['text']);
        $text = $row['text'];
        if($textlength <= 25) {
          echo '<td>'.$row['text'].'</td>';
        } else {
          $text = '<a href="reader.php?id='.$row['id'].'">'.substr($row['text'], 25).'...</a>';
          echo '<td>'.$text.'</td>';
        }
        echo'<td><a href="?delete='.$row['id'].'"<span class="glyphicon glyphicon-remove"></span></a></td>';
        echo '</tr>';
      }
      ?>
    </tbody>
  </table>
</div>
</div>
<?php
include("footer.inc.php");
?>
