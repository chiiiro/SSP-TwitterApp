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
        $query->execute([$post->title, $post->description, $post->content, $post->created, $post->username]);
    }

    public static function update(Post $post)
    {
        $db = Database::getInstance();
        $stmt = $db->prepare('UPDATE blog_posts SET posttitle = ?, postdesc = ?, postcont = ? WHERE postid = ?');
        $stmt->execute([$post->title, $post->description, $post->content, $post->id]);
    }

    public static function delete($id)
    {
        $db = Database::getInstance();
        $query = $db->prepare('DELETE FROM blog_posts WHERE postid = ?');
        $query->execute([$id]);
    }

//    public function save()
//    {
//        if(isset($this->id)) {
//            $this->update();
//        } else {
//            $this->insert();
//        }
//    }
}