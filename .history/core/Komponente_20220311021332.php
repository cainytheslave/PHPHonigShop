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
        $classes = "text-center cursor-pointer px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-$border-400";
        return "<input type='submit' name='$name' class='$classes' value='$text' />";
    }

    static function input($type = "text", $placeholder = '', $name = '', $value = '', $required = 'true')
    {
        $classes = "flex-1 text-left px-3 py-2 border-2 active:scale-95 border-orange-400";
        return "<input type='$type' name='$name' required='$required' class='$classes' placeholder='$placeholder' />";
    }

    static function alert($error = true, $data)
    {
        if (count($data) <= 0) return '';

        $str = '<section class="w-full p-4 mx-auto mt-4 bg-green-300 border-2 border-green-500 shadow-xl">';
        if ($error) $str = '<section class="w-full p-4 mx-auto mt-4 bg-red-300 border-2 border-red-500 shadow-xl">';

        foreach ($data as $entry) {
            $str .= '<p class="text-lg font-semibold">' . $entry . '</p>';
        }

        $str .= '</section>';

        return $str;
    }
}
