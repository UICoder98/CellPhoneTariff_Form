<?php
    function to_point ($string)
    {
        return floatval(str_replace(',', '.', $string));
    }

    function to_comma ($string)
    {
        return str_replace('.', ',', $string);
    }
?>