<?php

class Dimensions
{
    /**
     * @var $width
     */
    private $width;

    /**
     * @var $height
     */
    private $height;

    /**
     * @var $depth
     */
    private $depth;

    /**
     * @param $width
     * Set Width
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }

    /**
     * @return mixed
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * @param $height
     * Set Height
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }

    /**
     * @return mixed
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * @param $depth
     * Set Depth
     */
    public function setDepth($depth)
    {
        $this->depth = $depth;
    }

    /**
     * @return mixed
     */
    public function getDepth()
    {
        return $this->depth;
    }
}