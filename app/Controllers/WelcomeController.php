<?php




class WelcomeController
{

    public function showCountries()
    {
        require_once $_SERVER['DOCUMENT_ROOT'].'/public/views/countries/countries.php';
    }

    public function getCountriesController()
    {
        $model = new Countries();
        $model->getCountries();
    }

    public function addCountry()
    {
        $model = new Countries();
        $model->addCountry();
    }

}