<?php 

namespace App\Services;

class Location 
{

    public function getPosition() : ?array 
    {
        $currentIP = isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : "";
        $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.ipdata.co/$currentIP?api-key=f47e452ba704e2eb7ce64578459e659a4157026008c5f4e66dd64f7d",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);

            if ($err || curl_getinfo($curl, CURLINFO_HTTP_CODE) !== 200) {
                return null;
            } else {
                $response = json_decode($response, true);
                return $response;
            }
    }
}