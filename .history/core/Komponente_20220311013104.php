<?php

class Komponente
{

    static function link($text = "", $href = "", $border = "orange")
    {
        $classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-$border-400";
        return "<a href='$href' class='$classes'>$text</a>";
    }

    static function button($text = "", $name = "", $border = "orange")
    {
        $classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-$border-400";
        return "<input type='submit' name='$name' class='$classes' value='$text'>";
    }

    static function input($type = "text", $placeholder = '', $name = '')
    {
        $classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-orange-400";
        return "<input type='$type' name='$name' class='$classes' placeholder='$placeholder'>";
    }
}
