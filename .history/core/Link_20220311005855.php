<?php

class Link
{
    protected $text;
    protected $href;
    protected $border;
    protected $classes;

    function __construct($text = "", $href = "", $border = "orange")
    {
        $this->text = $text;
        $this->href = $href . '.php';
        $this->classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-$border-500";
    }

    function get()
    {
        return "<a href='$this->href' class='$this->classes'>$this->text</a>";
    }
}
