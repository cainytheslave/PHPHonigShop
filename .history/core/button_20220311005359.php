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

    function get(){
        return "<a href='".$this->href."' class='text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105'"
    }
}
