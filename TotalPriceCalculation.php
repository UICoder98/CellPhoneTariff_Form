<?php
    function get_total_price ($base_price, $minutes_used, $minute_price, $free_minutes)
    {
        $base_price = to_point($base_price);
        $minute_price = to_point($minute_price);

        if ($minutes_used > $free_minutes)
        {
            $total_price = $base_price + ($minutes_used - $free_minutes) * $minute_price;
        }
        else
        {
            $total_price = $base_price;
        }

        return $total_price;
    }
?>