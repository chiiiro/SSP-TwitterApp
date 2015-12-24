<?php

namespace templates;

use Repository\UserRepository;
use Views\AbstractView;
use templates\components\Post;

class Viewpost extends AbstractView {

    private $post;
    private $comments;

    protected function outputHTML()
    {
        $postView = new Post();
        $postView->setPageTitle('Post');
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
                    if($comment['userid'] === null) {
                        $username = 'guest';
                    } else {
                        $username = UserRepository::getUsernameById($comment['userid']);
                    }
                    ?>

                    <div class="panel-body">
                        <p><?php echo $comment['content']; ?></p>
                        <p><?php echo 'Created by: ' . $username; ?></p>
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

        <script type="text/javascript" >
            $(document).ready(function() {
                $('#comment').on('click', function(e)
                {
                    e.preventDefault();
                    var comment = $('#comm').val();
                    //provjera da li je prazan
                    var url = "<?php echo \route\Route::get("addComment")->generate(array("id"=>$this->post['postid'])); ?>";
                    $.post(url, {'comment': comment}, function (data) {
                        a = JSON.parse(data);
                        $('#comments').append('<div class="panel-body"><p>' + a.comment + '</p><p>Created by: ' + a.user + '</p></div>');
                        $('#comm').val('');
                    })
                        .fail(function (jqXHR) {
                            alert("error");
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
