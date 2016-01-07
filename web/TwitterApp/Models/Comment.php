<?php

namespace Models;

class Comment {

    private $commid;
    private $tweetid;
    private $userid;
    private $content;

    /**
     * @return mixed
     */
    public function getCommid()
    {
        return $this->commid;
    }

    /**
     * @param mixed $commid
     */
    public function setCommid($commid)
    {
        $this->commid = $commid;
    }

    /**
     * @return mixed
     */
    public function getTweetid()
    {
        return $this->tweetid;
    }

    /**
     * @param mixed $tweetid
     */
    public function setTweetid($tweetid)
    {
        $this->tweetid = $tweetid;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid)
    {
        $this->userid = $userid;
    }

    /**
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param mixed $content
     */
    public function setContent($content)
    {
        $this->content = $content;
    }

}