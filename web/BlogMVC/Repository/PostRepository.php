<?php


class PostRepository
{
    public static function getById($id)
    {
        $db = Database::getInstance();
        $query = $db->prepare('SELECT * FROM blog_posts WHERE "postid" = ?');
        $query->execute([$id]);
        return $query->fetch();
    }

    public static function getAll()
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_posts");
        $query->execute();
        return $query;
    }

    public static function getAllByUsername($username)
    {
        $db = Database::getInstance();
        $query = $db->prepare("SELECT * FROM blog_posts WHERE username = ?");
        $query->execute([$username]);
        return $query;
    }

    public static function insert(Post $post)
    {
        $db = Database::getInstance();
        $query = $db->prepare('INSERT INTO blog_posts (posttitle,postdesc,postcont,postdate, username) VALUES (?, ?, ?, ?, ?)');
        $query->execute([$post->getTitle(), $post->getDescription(), $post->getContent(), $post->getCreated(), $post->getUsername()]);
    }

    public static function update(Post $post)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare('UPDATE blog_posts SET posttitle = ?, postdesc = ?, postcont = ?, postdate = ? WHERE postid = ?');
        $stmt->execute([$post->getTitle(), $post->getDescription(), $post->getContent(), $post->getCreated(), $post->getId()]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance();
        $query = $db->prepare('DELETE FROM blog_posts WHERE postid = ?');
        $query->execute([$id]);
    }

}