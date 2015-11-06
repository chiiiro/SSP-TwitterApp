<!DOCTYPE HTML>
<html>

<head>
    <title><?php echo $pageTitle ?></title>
    <meta charset="utf-8">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ=="
          crossorigin="anonymous">

<head/>

<body background="<?php if($pageTitle == 'Home page') {echo 'clouds.jpg';} else {echo '../clouds.jpg';}?>" style="background-size: cover">
<div>

    <?php echo $body; ?>

</div>

</body>

</html>