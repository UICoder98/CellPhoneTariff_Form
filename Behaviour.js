let Packages;
let BasePrice;
let FreeMinutes;
let MinutePrice;
let isClickedDelete;

setInterval( function ()
{
    const DELETE_BUTTON = document.getElementById("delete");

    DELETE_BUTTON.addEventListener("click", function ()
    {
        isClickedDelete = true;
    });

    Packages = document.getElementsByName("package-type");
    BasePrice = document.getElementById("base-price");
    FreeMinutes = document.getElementById("free-minutes");
    MinutePrice = document.getElementById("minute-price");

    if (!isClickedDelete)
    {
        checkValue();
    }
    else
    {
        deleteData();
    }
});

function checkValue ()
{
    const BASE_PRICES = ["2,95 €", "3,95 €", "7,95 €", "12,95 €", "29,95 €"];
    const FREE_MINUTES = ["0", "100", "300", "600", "unbegrenzt"];
    const MINUTE_PRICES = ["0,10 €", "0,12 €", "0,15 €", "0,20 €", "0,00 €"];

    for (let i = 0; i < Packages.length; i++)
    {
        if (Packages[i].checked)
        {
            updateData(BASE_PRICES[i], FREE_MINUTES[i], MINUTE_PRICES[i]);
        }
    }
}

function updateData (basePrice, freeMinutes, minutePrice)
{
    BasePrice.value = basePrice;
    FreeMinutes.value = freeMinutes;
    MinutePrice.value = minutePrice;
}

function deleteData ()
{
    for (let i = 0; i < Packages.length; i++)
    {
        if (Packages[i].checked)
        {
            Packages[i].checked = false;
        }
    }

    BasePrice.value = FreeMinutes.value = MinutePrice.value = "";

    const MINUTES_USED = document.getElementById("minutes-used");
    MINUTES_USED.value = "0";

    isClickedDelete = false;
}