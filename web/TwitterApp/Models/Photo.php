<?php

namespace Models;

class Photo {

    private $photoid;
    private $galleryid;
    private $title;
    private $tags;
    private $created;
    private $image;

    /**
     * @return mixed
     */
    public function getPhotoid()
    {
        return $this->photoid;
    }

    /**
     * @param mixed $photoid
     */
    public function setPhotoid($photoid)
    {
        $this->photoid = $photoid;
    }

    /**
     * @return mixed
     */
    public function getGalleryid()
    {
        return $this->galleryid;
    }

    /**
     * @param mixed $galleryid
     */
    public function setGalleryid($galleryid)
    {
        $this->galleryid = $galleryid;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
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

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

}