<?php

class Plate
{
    private $label;
    private $imageLabel;
    private $image;
    private $author;
    private $link;
    private $article;
    
    public function __construct($article,$label, $imageLabel, $image, $author, $link)
    {
        $this->article = $article;
        $this->label = $label;
        $this->image = $image;
        $this->imageLabel = $imageLabel;
        $this->author = $author;
        $this->link = $link;

        $this->sanitiseLabel();
    }

    private function sanitiseLabel(){
        $this->label = str_replace("&quot;", '"', $this->label);
    }

    public function getLabel()
    {
        return $this->label;
    }
    
    public function getImageLabel()
    {
        return $this->imageLabel;
    }
    
    public function getImage()
    {
    	//$this->image = str_replace("/icons/noimage.jpg", '', $this->image);
        return $this->image;
    }
    
    public function getAuthor()
    {
        return $this->author;
    }
    
    public function getLink()
    {
        return $this->link;
    }
    
    public function getArticle()
    {
        return $this->article;
    }
}