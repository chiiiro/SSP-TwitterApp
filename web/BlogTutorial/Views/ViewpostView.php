<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog - <?php echo $row['posttitle'];?></title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

<div id="wrapper">

    <h1>Blog</h1>
    <hr />
    <p><a href="./">Blog Index</a></p>


    <?php
    echo '<div>';
    echo '<h1>'.$row['posttitle'].'</h1>';
    echo '<p>Posted on '.date('jS M Y', strtotime($row['postdate'])).'</p>';
    echo '<p>'.$row['postcont'].'</p>';
    echo '</div>';
    ?>

</div>

</body>
</html>