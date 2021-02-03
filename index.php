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
                    <td><input type="number" name="wasted-minutes" value="<?php global $wasted_minutes; echo $wasted_minutes;?>" min="0"></td>
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

            switch ($package_type)
            {
                case "P_Basis":

                    echo "<tr><td class='col'>Basispreis:</td><td>" . $package_base->get_base_price() . "</td></tr>";
                    echo "<tr><td class='col'>Freiminuten:</td><td>" . $package_base->get_free_minutes() . "</td></tr>";
                    echo "<tr><td class='col'>Minutenpreis:</td><td>" . $package_base->get_minute_price() . "</td></tr>";

                    break;

                case "P_100":

                    echo "<tr><td class='col'>Basispreis:</td><td>" . $package_100->get_base_price() . "</td></tr>";
                    echo "<tr><td class='col'>Freiminuten:</td><td>" . $package_100->get_free_minutes() . "</td></tr>";
                    echo "<tr><td class='col'>Minutenpreis:</td><td>" . $package_100->get_minute_price() . "</td></tr>";

                    break;

                case "P_300":

                    echo "<tr><td class='col'>Basispreis:</td><td>" . $package_300->get_base_price() . "</td></tr>";
                    echo "<tr><td class='col'>Freiminuten:</td><td>" . $package_300->get_free_minutes() . "</td></tr>";
                    echo "<tr><td class='col'>Minutenpreis:</td><td>" . $package_300->get_minute_price() . "</td></tr>";

                    break;

                case "P_600":

                    echo "<tr><td class='col'>Basispreis:</td><td>" . $package_600->get_base_price() . "</td></tr>";
                    echo "<tr><td class='col'>Freiminuten:</td><td>" . $package_600->get_free_minutes() . "</td></tr>";
                    echo "<tr><td class='col'>Minutenpreis:</td><td>" . $package_600->get_minute_price() . "</td></tr>";

                    break;

                case "P_Flat":

                    echo "<tr><td class='col'>Basispreis:</td><td>" . $package_flat->get_base_price() . "</td></tr>";
                    echo "<tr><td class='col'>Freiminuten:</td><td>" . $package_flat->get_free_minutes() . "</td></tr>";
                    echo "<tr><td class='col'>Minutenpreis:</td><td>" . $package_flat->get_minute_price() . "</td></tr>";

                    break;
            }

            global $wasted_minutes;
            echo "<tr><td class='col'>verbrauchte Minuten:</td><td>" . $wasted_minutes . "</td></tr></table>";
        }
    }
?>