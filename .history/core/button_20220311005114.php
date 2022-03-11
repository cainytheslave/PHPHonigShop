<?php

class Link
{
    protected $text;
    protected $href;
    protected $border;

    function __construct($text = "", $href = "", $border = "orange")
    {
        $this->text = $text;
        $this->href = $href;
        $this->border = $border;
    }
}
