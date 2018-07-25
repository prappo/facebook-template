<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class Boot extends Controller
{


    /**
     * @param $jsonData
     * @param $pageId
     */
    public static function thread($jsonData, $pageId)
    {
        $url = 'https://graph.facebook.com/v2.6/me/thread_settings?access_token=' . Data::getToken($pageId);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec($ch);
    }


}
