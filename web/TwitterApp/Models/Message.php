<?php

namespace Models;

class Message {

    private $id;
    private $senderID;
    private $recipientID;
    private $content;
    private $read;
    private $created;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSenderID()
    {
        return $this->senderID;
    }

    /**
     * @param mixed $senderID
     */
    public function setSenderID($senderID)
    {
        $this->senderID = $senderID;
    }

    /**
     * @return mixed
     */
    public function getRecipientID()
    {
        return $this->recipientID;
    }

    /**
     * @param mixed $recipientID
     */
    public function setRecipientID($recipientID)
    {
        $this->recipientID = $recipientID;
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

    /**
     * @return mixed
     */
    public function getRead()
    {
        return $this->read;
    }

    /**
     * @param mixed $read
     */
    public function setRead($read)
    {
        $this->read = $read;
    }

    /**
     * @return mixed
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param mixed $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }
}