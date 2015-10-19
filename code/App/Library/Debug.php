<?php

namespace App\Library;

class Debug
{
    public static function dd($array)
    {
        echo '<pre>'; // This is for correct handling of newlines
        ob_start();
        var_dump($array);
        $a=ob_get_contents();
        ob_end_clean();
        echo htmlspecialchars($a,ENT_QUOTES); // Escape every HTML special chars (especially > and < )
        echo '</pre>';
    }
}
