<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobilfunktarif</title>
    <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
</head>

<?php
    require_once "../PHP/CellPhoneTariff.php";
?>

<body>
    <h2>Mobilfunktarif</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <fieldset>
            <legend>Formular</legend>
            <table>
                <tr>
                    <td>Auswahl Paket-Typ</td>
                    <td>
                        <input type="radio" name="package-type" value="P_Basis" <?php if (isset($package_type) && $package_type == "P_Basis") echo "checked";?>> P_Basis
                        <input type="radio" name="package-type" value="P_100" <?php if (isset($package_type) && $package_type == "P_100") echo "checked";?>> P_100
                        <input type="radio" name="package-type" value="P_300" <?php if (isset($package_type) && $package_type == "P_300") echo "checked";?>> P_300
                        <input type="radio" name="package-type" value="P_600" <?php if (isset($package_type) && $package_type == "P_600") echo "checked";?>> P_600
                        <input type="radio" name="package-type" value="P_Flat" <?php if (isset($package_type) && $package_type == "P_Flat") echo "checked";?>> P_Flat
                    </td>
                </tr>

                <tr>
                    <td>Basispreis</td>
                    <td><input type="text" id="base-price" name="base-price" value="<?php if (isset($package_type) && $package_type == "P_Basis") echo $package_base->get_base_price();
                                                                                          if (isset($package_type) && $package_type == "P_100") echo $package_100->get_base_price();
                                                                                          if (isset($package_type) && $package_type == "P_300") echo $package_300->get_base_price();
                                                                                          if (isset($package_type) && $package_type == "P_600") echo $package_600->get_base_price();
                                                                                          if (isset($package_type) && $package_type == "P_Flat") echo $package_flat->get_base_price();?>" readonly></td>
                </tr>

                <tr>
                    <td>Freiminuten</td>
                    <td><input type="text" id="free-minutes" name="free-minutes" value="<?php if (isset($package_type) && $package_type == "P_Basis") echo $package_base->get_free_minutes();
                                                                                              if (isset($package_type) && $package_type == "P_100") echo $package_100->get_free_minutes();
                                                                                              if (isset($package_type) && $package_type == "P_300") echo $package_300->get_free_minutes();
                                                                                              if (isset($package_type) && $package_type == "P_600") echo $package_600->get_free_minutes();
                                                                                              if (isset($package_type) && $package_type == "P_Flat") echo $package_flat->get_free_minutes();?>" readonly></td>
                </tr>

                <tr>
                    <td>Minutenpreis</td>
                    <td><input type="text" id="minute-price" name="minute-price" value="<?php if (isset($package_type) && $package_type == "P_Basis") echo $package_base->get_minute_price();
                                                                                              if (isset($package_type) && $package_type == "P_100") echo $package_100->get_minute_price();
                                                                                              if (isset($package_type) && $package_type == "P_300") echo $package_300->get_minute_price();
                                                                                              if (isset($package_type) && $package_type == "P_600") echo $package_600->get_minute_price();
                                                                                              if (isset($package_type) && $package_type == "P_Flat") echo $package_flat->get_minute_price();?>" readonly></td>
                </tr>

                <tr>
                    <td>verbrauchte Minuten</td>
                    <td><input type="number" name="minutes-used" value="<?php echo $minutes_used;?>" min="0"></td>
                </tr>
            </table>
        </fieldset>

        <input type="submit" value="Absenden">
        <input type="reset" value="Löschen">
    </form>
</body>
</html>

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
            echo "<tr><td class='col'>verbrauchte Minuten:</td><td>" . $minutes_used . "</td></tr>";

            $total_price = sprintf("%.2f", get_total_price($base_price, $minutes_used, $minute_price, $free_minutes));
            echo "<tr><td class='col'>Gesamtpreis:</td><td>" . to_comma($total_price) . " €</td></tr></table>";
        }
    }

    function get_total_price ($base_price, $minutes_used, $minute_price, $free_minutes)
    {
        $minute_price = to_point($minute_price);
        $base_price = to_point($base_price);

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

    function to_point ($string)
    {
        return floatval(str_replace(',', '.', $string));
    }

    function to_comma ($string)
    {
        return str_replace('.', ',', $string);
    }
?>