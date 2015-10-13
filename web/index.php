<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tablica množenja</title>
</head>
<body>
    <h1>
        <?php
        $cols = 10;
        $rows = 10;

        echo "<table border=\"1\" style=\"width:50%\"\">";

        for ($r =1; $r <= $rows; $r++){

            echo'<tr>';

            for ($c = 1; $c <= $cols; $c++)
                echo '<td>' .$c*$r.'</td>';
            echo '</tr>'; // close tr tag here

        }

        echo"</table>";
        ?>
    </h1>

</body>
</html>