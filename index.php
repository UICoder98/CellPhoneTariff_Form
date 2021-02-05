<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mobilfunktarif</title>
    <link rel="stylesheet" type="text/css" href="../CSS/Design.css">
    <script src="../JS/Behaviour.js"></script>
</head>

<?php
    require_once "../PHP/CellPhoneTariff.php";
?>

<body>
    <h2>Mobilfunktarif</h2>
    <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
                    <td><input type="number" id="minutes-used" name="minutes-used" value="<?=intval($minutes_used);?>" min="0"></td>
                </tr>
            </table>
        </fieldset>

        <input type="submit" value="Absenden">
        <input type="button" id="delete" value="Löschen">
    </form>
</body>
</html>

<?php
    require_once "TotalPriceCalculation.php";
    require_once "Conversion.php";
    require_once "OutputData.php";
?>