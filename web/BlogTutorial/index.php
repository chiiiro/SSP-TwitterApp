<?php require('includes/config.php'); ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Blog</title>
    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/main.css">
</head>
<body>

	<div id="wrapper">

		<h1>Blog</h1>
		<hr />

		<?php
			try {

				$stmt = $db->query('SELECT postid, posttitle, postdesc, postdate FROM blog_posts');
				while($row = $stmt->fetch()){
					
					echo '<div>';
						echo '<h1><a href="viewpost.php?id='.$row['postid'].'">'.$row['posttitle'].'</a></h1>';
						echo '<p>Posted on '.date('jS M Y H:i:s', strtotime($row['postdate'])).'</p>';
						echo '<p>'.$row['postdesc'].'</p>';
						echo '<p><a href="viewpost.php?id='.$row['postid'].'">Read More</a></p>';
					echo '</div>';

				}

			} catch(PDOException $e) {
			    echo $e->getMessage();
			}
		?>

	</div>


</body>
</html>