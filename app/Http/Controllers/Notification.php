<?php

namespace App\Http\Controllers;

use App\Notifications;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class Notification extends Controller
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
        $data = Notifications::where('userId', Auth::user()->id)->get();
        return view('notifications', compact('data'));
    }

    /**
     * @return string
     */
    public function delete()
    {
        try {
            Notifications::where('userId', Auth::user()->id)->delete();
            return "success";
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
