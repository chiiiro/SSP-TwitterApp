<?php

namespace templates;

use Repository\UserRepository;
use Views\AbstractView;
use templates\components\Post;

class Read extends AbstractView {

    private $post;
    private $comments;

    protected function outputHTML()
    {
        $postView = new Post();
        $postView->setPageTitle('User post');
        $postView->setPost($this->post);
        echo $postView;

        ?>

        <div>

            <div class="panel panel-info" id="comments">
                <div class="panel-heading">
                    <h3 class="panel-title">Comments</h3>
                </div>
                <?php

                foreach ($this->comments as $comment) {
                    $username = UserRepository::getUsernameById($this->post['userid']);
                    ?>

                        <div class="panel-body">
                            <p><?php echo $comment['content']; ?></p>
                            <p><?php echo 'Created by: ' . $username;?></p>
                        </div>

                    <?php
                }
                ?>
            </div>

        </div>

        <div>

            <form class="form-horizontal" role="form" id="commentform" action="<?php echo \route\Route::get("readPost")->generate(array("id"=>$this->post['postid'])); ?>" method="post">
                <div class="form-group">
                    <div class="col-sm-6">
                        <textarea class="form-control" rows="3" name="comm" id="comm" placeholder="Enter comment"></textarea>
                    </div>
                </div>

                <p id="error"></p>

                <input type="submit" class="btn btn-default" name="comment" id="comment" value="Add comment">
            </form>

        </div>

        <a href="<?php echo \route\Route::get("editPost")->generate(array("id"=>$this->post['postid'])); ?>" role="button" class="btn btn-link">Edit post</a>
        <a href="<?php echo \route\Route::get("delete")->generate(array("id"=>$this->post['postid'])); ?>" role="button" class="btn btn-link" onclick="javascript: return confirm
				('Are you sure you want to delete?');">Delete post</a>
        <a href="<?php echo \route\Route::get("userIndex")->generate(); ?>" role="button" class="btn btn-link">Back</a>


        <script type="text/javascript" >
            $(document).ready(function() {
                $('#comment').on('click', function(e) {
                    e.preventDefault();
                    var comment = $('#comm').val();
                    //provjera da li je prazan
                    var url = "<?php echo \route\Route::get("addComment")->generate(array("id"=>$this->post['postid'])); ?>";
                    $.post(url, {'comment' : comment})
                    .done(function(data) {
                            a = JSON.parse(data);
                            $('#comments').append('<div class="panel-body"><p>' + a.comment + '</p><p>Created by: ' + a.user + '</p></div>');
                            $("#comm").replaceWith($("#comm").clone());
                            $('#comm').val('');
                    })
                    .fail(function(jqXHR) {
                        alert( "error" );
                    });
                });
            });
        </script>
    <?php
    }

    /**
     * @param mixed $post
     */
    public function setPost($post)
    {
        $this->post = $post;
        return $this;
    }

    /**
     * @param mixed $comments
     */
    public function setComments($comments)
    {
        $this->comments = $comments;
    }

}

?>