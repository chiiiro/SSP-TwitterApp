<?php
require_once(VIEW_PATH . 'header.php');
?>

    <body>
    <div class="container">
        <h1></h1>
        <h1></h1>


    <div class="jumbotron">
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



    <form class="form-horizontal" role="form" action="" method="post">
        <input type="submit" class="btn btn-default" name="login" id="login" value="Login">
        <input type="submit" class="btn btn-default" name="register" id="register" value="Register">
    </form>

<?php
require_once(VIEW_PATH . 'footer.php');