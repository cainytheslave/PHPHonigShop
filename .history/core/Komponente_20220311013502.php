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
        return "<input type='submit' name='$name' class='$classes' value='$text' />";
    }

    static function input($type = "text", $placeholder = '', $name = '')
    {
        $classes = "text-center px-3 py-2 border-2 hover:bg-gray-200 active:scale-95 hover:scale-105 border-orange-400";
        return "<input type='$type' name='$name' class='$classes' placeholder='$placeholder' />";
    }

    static function alert($error = true, $errors = []){
        $str = '<section class="w-full p-4 mx-auto mt-4 bg-green-300 border-2 border-green-500 shadow-xl">';
        if($error) $str = 
                <?php foreach ($success as $success) : ?>
                    <p class="text-lg font-semibold">Erfolg: <?= $success ?></p>
                <?php endforeach; ?>
            </section>";
    }
}
