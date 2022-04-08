<?php
class basketManager{
    public static function getBasket(){
        if (isset($_SESSION["basket"])) {
            return $_SESSION["basket"];
        }

}
public static function updateBasketData(string $id, string $calc)
{
    if(isset($_SESSION["basket"][$id]))
    {
        eval('$_SESSION["basket"][$id] ' . $calc . ";");
    }
    else
    {
        $_SESSION["basket"][$id] = explode(" ", $calc)[1];
    }
}

    public static function clearBasket(){
        unset($_SESSION["basket"]);
    }

}
