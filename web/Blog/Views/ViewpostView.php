<?php

function displayPost($post) {
    echo '<div>';
    echo '<h1>' . $post['postTitle'] . '</h1>';
    echo '<p>Posted on ' . date('jS M Y', strtotime($post['postDate'])) . '</p>';
    echo '<p>' . $post['postCont'] . '</p>';
    echo '</div>';
}