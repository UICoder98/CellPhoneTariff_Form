<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["package-type"]))
        {
            echo "<h2>Ihre Auswahl:</h2>";
            echo "<table><tr><td class='col'>Auswahl Paket-Typ:</td><td>" . $package_type . "</td></tr>";

            $base_price = $free_minutes = $minute_price = "";

            switch ($package_type)
            {
                case "P_Basis":

                    $base_price = $package_base->get_base_price();
                    $free_minutes = $package_base->get_free_minutes();
                    $minute_price = $package_base->get_minute_price();

                    break;

                case "P_100":

                    $base_price = $package_100->get_base_price();
                    $free_minutes = $package_100->get_free_minutes();
                    $minute_price = $package_100->get_minute_price();

                    break;

                case "P_300":

                    $base_price = $package_300->get_base_price();
                    $free_minutes = $package_300->get_free_minutes();
                    $minute_price = $package_300->get_minute_price();

                    break;

                case "P_600":

                    $base_price = $package_600->get_base_price();
                    $free_minutes = $package_600->get_free_minutes();
                    $minute_price = $package_600->get_minute_price();

                    break;

                case "P_Flat":

                    $base_price = $package_flat->get_base_price();
                    $free_minutes = $package_flat->get_free_minutes();
                    $minute_price = $package_flat->get_minute_price();

                    break;
            }

            echo "<tr><td class='col'>Basispreis:</td><td>" . $base_price . "</td></tr>";
            echo "<tr><td class='col'>Freiminuten:</td><td>" . $free_minutes . "</td></tr>";
            echo "<tr><td class='col'>Minutenpreis:</td><td>" . $minute_price . "</td></tr>";
            echo "<tr><td class='col'>verbrauchte Minuten:</td><td>" . intval($minutes_used) . "</td></tr>";

            $total_price = get_total_price($base_price, $minutes_used, $minute_price, $free_minutes);
            echo "<tr><td class='col'>Gesamtpreis:</td><td>" . to_comma(sprintf("%.2f", $total_price)) . " €</td></tr></table>";
        }
    }
?>