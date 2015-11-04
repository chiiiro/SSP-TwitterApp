<?php
require_once(VIEW_PATH . 'header.php');
?>

    <body background="clouds.jpg" style="background-size: cover">
    <div class="container">
        <h1></h1>
        <h1></h1>


    <div style="background: transparent" class="jumbotron">

        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="index.php">Home</a></li>
            <li role="presentation"><a href="Controllers/login.php">Login</a></li>
            <li role="presentation"><a href="Controllers/register.php">Register</a></li>
        </ul>

        <h1>Home page</h1>
        <p>This is a simple blog created for learning purposes. New user can register, login and then add, update
            or delete posts. Unregistered users can only view posts stored in database.
        </p>

        <?php
        foreach ($posts as $post) {
            ?>

            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title"><a href="viewpost.php?id=<?php echo $post['postid'] ?>"><?php echo $post['posttitle']?></a></h3>
                </div>
                <div class="panel-body">
                    <?php echo $post['postdesc']; ?>
                </div>
                <div class="panel-footer">
                    <?php echo 'Created by: ' . $post['username']; ?>
                </div>
            </div>

            <?php
        }
        ?>

    </div>

<?php
require_once(VIEW_PATH . 'footer.php');