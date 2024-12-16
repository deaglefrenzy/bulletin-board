<?php

namespace Suryo\Learn\Core;

class Functions
{
    static function dd($value)
    {
        echo "<pre>";
        var_dump($value);
        echo "</pre>";

        die();
    }
}
