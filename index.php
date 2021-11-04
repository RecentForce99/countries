<?php
require_once $_SERVER['DOCUMENT_ROOT'].'/resources/autoload/Autoload.php';

$query = $_GET['query'];

$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $query);

    if($method == 'GET')
    {
        switch ($query)
        {
            case 'get/countries':
                $controller = new WelcomeController();
                $controller->getCountriesController();
                break;
            default:
                $controller = new WelcomeController();
                $controller->showCountries();
            break;

        }
    }
    elseif($method == 'POST')
    {
        switch ($query)
        {
            case 'add/country':
                $controller = new WelcomeController();
                $controller->addCountry();
            break;
        }
    }
?>
