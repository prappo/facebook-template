<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Catagories;
use App\Customers;
//use App\Orders;
use App\FacebookPages;
use App\Products;
use Stichoza\GoogleTranslate\TranslateClient;

class Run extends Controller
{
    /**
     * Main execution point
     *
     * @param $input
     */

    public static function now($input)
    {
        $sender = isset($input['entry'][0]['messaging'][0]['sender']['id']) ? $input['entry'][0]['messaging'][0]['sender']['id'] : $input['entry'][0]['standby'][0]['sender']['id'];
        $pageId = isset($input['entry'][0]['messaging'][0]['recipient']['id']) ? $input['entry'][0]['messaging'][0]['recipient']['id'] : $input['entry'][0]['standby'][0]['recipient']['id'];
        $postback = isset($input['entry'][0]['messaging'][0]['postback']['payload']) ? $input['entry'][0]['messaging'][0]['postback']['payload'] : "nothing";
        $catPostBack = isset($input['entry'][0]['messaging'][0]['message']['quick_reply']['payload']) ? $input['entry'][0]['messaging'][0]['message']['quick_reply']['payload'] : "nothing";
        $message = isset($input['entry'][0]['messaging'][0]['message']['text']) ? $input['entry'][0]['messaging'][0]['message']['text'] : "nothing";
        $url = 'https://graph.facebook.com/v2.6/me/messages?access_token=' . Data::getToken($pageId);
        $linking = isset($input['entry'][0]['messaging'][0]['account_linking']['status']) ? $input['entry'][0]['messaging'][0]['account_linking']['status'] : "nothing";
        $location = isset($input['entry'][0]['messaging'][0]['message']['attachments'][0]['payload']['coordinates']) ? $input['entry'][0]['messaging'][0]['message']['attachments'][0]['payload']['coordinates'] : "nothing";
        $ch = curl_init($url);
        $jsonData = "";
        $msg = "";

        /*
         * Boot up section
         *
         * */


    }


}
