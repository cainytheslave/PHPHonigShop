<?php

class Komponente
{

    static function link($text = "", $href = "", $border = "orange")
    {
        $href = $href . '.php';
        $classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-$border-500";
        return "<a href='$this->href' class='$this->classes'>$this->text</a>";
    }

    function get()
    {
    }
}
