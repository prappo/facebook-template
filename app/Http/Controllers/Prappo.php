<?php

namespace App\Http\Controllers;


use App\FacebookPages;
use App\Orders;
use App\Products;

use Mailgun\Mailgun;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use Stichoza\GoogleTranslate\TranslateClient;

class Prappo extends Controller
{
    /**
     * @return string
     */
    public function index()
    {
        try {
            MailController::testSend("154501781895863");
            return "Success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }


    /**
     * @param $pageId
     */
    public function subscribe($pageId)
    {
        $url = 'https://graph.facebook.com/v2.8/me/subscribed_apps?access_token=' . Data::getToken($pageId);
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_exec($ch);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getProduct($id)
    {
        return Products::where('id', $id)->get();
    }


    /**
     * @return string
     */
    public function paymentStatus()
    {
        return "ok";
    }

    /**
     * @return string
     */
    public function paymentCancel()
    {
        return "Canceled";
    }




}
