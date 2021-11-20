<?php

namespace MoemenGaballah\Msegat;

class Msegat
{
    public static function data($numbers = "", $message = '')
    {
        $username = config('msegat.MSEGAT_USERNAME');
        $userSender = config('msegat.MSEGAT_USER_SENDER');
        $apiKey = config('msegat.MSEGAT_API_KEY');

        if(empty($username)){
            throw new \Exception('Please add msegata username in file env');
        }

        if(empty($userSender)){
            throw new \Exception('Please add msegata user sender in file env');
        }

        if(empty($apiKey)){
            throw new \Exception('Please add msegata ApiKey in file env');
        }

        if(empty($numbers)){
            throw new \Exception('Please add numbers to send message');
        }

        $fields = json_encode([
            "userName"      => $username,
            "numbers"      => $numbers,
            "userSender"   => $userSender,
            "apiKey"       => $apiKey,
            "msg"          => $message
        ]);

        return $fields;
    }

    public static function sendMessage($numbers = '',$message = '')
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://www.msegat.com/gw/sendsms.php");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, 0);

        curl_setopt($ch, CURLOPT_POST, TRUE);

        $fields = Msegat::data($numbers,$message);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type: application/json"
        ));

        $response = curl_exec($ch);
        $info = curl_getinfo($ch);
        curl_close($ch);

        $response = json_decode($response);

         return $response;
    }
}
