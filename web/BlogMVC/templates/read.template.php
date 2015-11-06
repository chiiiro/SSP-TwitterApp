<?php echo Template::create("components/post", array(
    "post" => $post,
    "pageTitle" => "User post"
)); ?>

<a href="update.php?id=<?php echo $post['postid']; ?>" role="button" class="btn btn-link">Update</a>
<a href="delete.php?id=<?php echo $post['postid']; ?>" role="button" class="btn btn-link" onclick="javascript: return confirm
				('Are you sure you want to delete?');">Delete</a>
<a href="user_index.php" role="button" class="btn btn-link">Back</a>