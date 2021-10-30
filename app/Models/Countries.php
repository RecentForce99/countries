<?php

require_once 'database/DB.php';

class Countries
{


    public function getCountries()
    {
        header('Content-type: json/application');

        $db = DB::connect();
        $sql = "SELECT country_name FROM `countries` GROUP BY country_name";
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_NUM);

        if(count($result) > 0)
        {
            foreach ($result as $val)
            {
                $res[] = $val[0];
            }
            echo json_encode($res);
        }
        else
        {
            return "<h3>Ни одной записи не найдено</h3>";
        }

    }

    public function addCountry()
    {
        header('Content-type: json/application');
        $json = file_get_contents('php://input');
        $array = json_decode($json, true);
        $country = filter_var(trim(htmlspecialchars(strip_tags($array['country']))), FILTER_SANITIZE_STRING);
        if($country == '')
        {
            $message = 'Вы не написали название страны';
            echo json_encode($message);
            die;
        }

        $db = DB::connect();
        $sql = "INSERT INTO `countries` (`country_name`) VALUE (?)";
        $stmt = $db->prepare($sql);
        $stmt->execute([$country]);
        $message = 'Страна успешно добавлена';
        echo json_encode($message);
    }

}













