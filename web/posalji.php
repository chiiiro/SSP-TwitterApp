<?php
/**
 * Created by PhpStorm.
 * User: ivanciric
 * Date: 13/10/15
 * Time: 13:29
 */

//echo 'Hello ' . htmlspecialchars($_GET["name"]) . ' '. htmlspecialchars($_GET["surname"]) . '!';

$ime = $_POST['ime'];
$subject = $_POST['subject'];
$email = $_POST['email'];
$toemail = "ivan.ciric@sofascore.com";
$tekst = $_POST['text'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mailer</title>
</head>
<body>
    <?php
        mail($toemail, $subject, $tekst, "From: " . $email);
    ?>
    <p>
        Mail je uspješno poslan.
    </p>
    <p>
      <input type="submit" name="Submit" value="Povratak" onmouseup="location='obrazac.html'">
    </p>
</body>
</html>