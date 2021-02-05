<?php
    class CellPhoneTariff
    {
        private $base_price;
        private $free_minutes;
        private $minute_price;

        function __construct ($base_price, $free_minutes, $minute_price)
        {
            $this->base_price = $base_price;
            $this->free_minutes = $free_minutes;
            $this->minute_price = $minute_price;
        }

        function get_base_price ()
        {
            return $this->base_price;
        }

        function get_free_minutes ()
        {
            return $this->free_minutes;
        }

        function get_minute_price ()
        {
            return $this->minute_price;
        }
    }

    $package_base = new CellPhoneTariff("2,95 €", "0", "0,10 €");
    $package_100 = new CellPhoneTariff("3,95 €", "100", "0,12 €");
    $package_300 = new CellPhoneTariff("7,95 €", "300", "0,15 €");
    $package_600 = new CellPhoneTariff("12,95 €", "600", "0,20 €");
    $package_flat = new CellPhoneTariff("29,95 €", "unbegrenzt", "0,00 €");

    $package_type = "";
    $minutes_used = "0";

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (isset($_POST["package-type"]))
        {
            $package_type = $_POST["package-type"];
            $minutes_used = $_POST["minutes-used"];
        }
    }
?>