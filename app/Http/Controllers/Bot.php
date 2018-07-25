<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class Bot extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $data = \App\Bot::where('userId', Auth::user()->id)->get();
        return view('bot', compact('data'));
    }

    /**
     * @param Request $request
     * @return string
     * Add reply for bot
     */
    public function addReply(Request $request)
    {
        try {
            $bot = new \App\Bot();
            $bot->message = $request->message;
            $bot->reply = $request->reply;
            $bot->pageId = $request->pageId;
            $bot->userId = Auth::user()->id;
            $bot->save();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    /**
     * @param Request $request
     * @return string
     * Delete the bot reply
     */
    public function delReply(Request $request)
    {
        try {
            \App\Bot::where('id', $request->id)->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     * @param $msg
     * @param $pageId
     * @return string
     * Check message
     */
    public static function check($msg, $pageId)
    {
        $result = 0;
        $data = "";
        foreach (\App\Bot::where('pageId', $pageId)->get() as $bot) {

            similar_text($msg, $bot->message, $result);
            if ($result >= 65) {
                $data = $bot->reply;
                break;
            }
        }
        return $data;
    }

    /**
     * @param $msg
     * @return int
     * Check percentage of incoming message
     */
    public static function checkPer($msg)
    {
        $result = 0;
        foreach (\App\Bot::all() as $bot) {

            similar_text($msg, $bot->message, $result);
            if ($result >= 65)
                break;
        }
        return (int)$result;
    }
}
