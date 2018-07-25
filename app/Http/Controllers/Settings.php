<?php

namespace App\Http\Controllers;

use App\FacebookPages;
use App\SiteSettings;
use App\Translate;
use App\User;
use Facebook\Exceptions\FacebookResponseException;
use Facebook\Exceptions\FacebookSDKException;
use Facebook\Facebook;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Settings extends Controller
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


        $fb = new Facebook([
            'app_id' => self::getAppId(),
            'app_secret' => self::getAppSec(),
            'default_graph_version' => 'v2.6',
        ]);

        try {
            $permissions = ['pages_messaging', 'publish_actions', 'manage_pages', 'publish_pages', 'read_page_mailboxes'];
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl(url('') . '/fbconnect', $permissions);
        } catch (\Exception $e) {
            $loginUrl = url('/');
        }


        return view('settings', compact('loginUrl'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function translation()
    {
        if (Auth::user()->type != 'admin') {
            return view('home');
        }
        return view('translation');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function updateTranslation(Request $request)
    {
        $inputs = $request->input();
        $count = 1;
        $result = "";
        try {
            foreach ($inputs as $input) {
                Translate::where('langId', $count)->update(['lang' => $inputs[$count]]);
                $count++;
            }
            $result = "<div class=\"alert alert-success\" role=\"alert\">Updated successfully</div>";

            return view('result', compact('result'));
        } catch (\Exception $e) {
            $result = "<div class=\"alert alert-danger\" role=\"alert\">" . $e->getMessage() . "</div>";
            return view('result', compact($result));
        }


    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|string
     */
    public function fbConnect()
    {
        session_start();

        $fb = new Facebook([
            'app_id' => self::getAppId(),
            'app_secret' => self::getAppSec(),
            'default_graph_version' => 'v2.6',
        ]);

        $helper = $fb->getRedirectLoginHelper();
        $_SESSION['FBRLH_state'] = $_GET['state'];

        try {
            $accessToken = $helper->getAccessToken();
            $_SESSION['token'] = $accessToken;


            $response = $fb->get('me/accounts', $accessToken);
            $body = $response->getBody();
            $data = json_decode($body, true);

            foreach ($data['data'] as $no => $filed) {
                if (!FacebookPages::where('pageId', $filed['id'])->exists()) {
                    $facebookPages = new FacebookPages();
                    $facebookPages->pageId = $filed['id'];
                    $facebookPages->pageName = $filed['name'];
                    $facebookPages->pageToken = $filed['access_token'];
                    $facebookPages->userId = Auth::user()->id;
                    $facebookPages->save();
                }


            }

        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            return '[a] Graph returned an error: ' . $e->getMessage();

        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            return '[a] Facebook SDK returned an error: ' . $e->getMessage();

        }

        try {
            $response = $fb->get('/me', $_SESSION['token']);
        } catch (FacebookResponseException $e) {
            return '[b] Graph returned an error: ' . $e->getMessage();
            exit;
        } catch (FacebookSDKException $e) {
            return '[b] Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        $getProfileInfo = $fb->get('me?fields=picture,name', $accessToken)->getDecodedBody();
        $profilePic = $getProfileInfo['picture']['data']['url'];
        $name = $getProfileInfo['name'];
        User::where('id', Auth::user()->id)->update([
            'image' => $profilePic,
            'name' => $name
        ]);


        return redirect('settings/pages');


    }

    /**
     * @param $key
     * @return mixed
     */
    public static function get($value, $userId = "")
    {
        if ($userId == "") {
            return \App\Settings::where('userId', Auth::user()->id)->value($value);
        } else {
            return \App\Settings::where('userId', $userId)->value($value);
        }

    }

    /**
     * @param $key
     * @return mixed
     */
    public static function getLang($key)
    {
        return Translate::where('langId', $key)->value('lang');
    }

    /**
     * @param Request $re
     * @return string
     */
    public function update(Request $re)
    {
        try {
            DB::table('settings')->where('userId', Auth::user()->id)->update(['token' => $re->token]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['email' => $re->email]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['currency' => $re->currency]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['paymentMethod' => $re->paymentMethod]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['shipping' => $re->shipping]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['afterOrderMsg' => $re->afterOrderMsg]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['tax' => $re->tax]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['logo' => $re->logo]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['title' => $re->title]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['subTitle' => $re->subTitle]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['phone' => $re->phone]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['address' => $re->address]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['map' => $re->map]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['mgApiKey' => $re->mgApiKey]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['mgDomain' => $re->mgDomain]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['mgEmail' => $re->mgEmail]);


            DB::table('settings')->where('userId', Auth::user()->id)->update(['paypalClientId' => $re->paypalClientId]);
            DB::table('settings')->where('userId', Auth::user()->id)->update(['paypalClientSecret' => $re->paypalClientSecret]);
            if (PackagesController::isMyPackage('woo')) {
                DB::table('settings')->where('userId', Auth::user()->id)->update(['wpUrl' => $re->wpUrl]);
                DB::table('settings')->where('userId', Auth::user()->id)->update(['wooConsumerKey' => $re->wooConsumerKey]);
                DB::table('settings')->where('userId', Auth::user()->id)->update(['wooConsumerSecret' => $re->wooConsumerSecret]);
            }


            return "success";

        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }


    /**
     * @param Request $request
     * @return string
     */
    public function updateFacebook(Request $request)
    {
        try {

        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function bot()
    {
        return view('botsettings');
    }

    /**
     * @param Request $request
     */
    public function botUpdate(Request $request)
    {
        $pageId = $request->pageId;
        if ($request->message == "") {
            $message = "Welcome to my Shop";
        } else {
            $message = $request->message;
        }
        $jsonGreeting = '{
  "setting_type":"greeting",
  "greeting":{
    "text":"' . $message . '"
  }
}';
        $jsonMenu = '{
  "setting_type" : "call_to_actions",
  "thread_state" : "existing_thread",
  "call_to_actions":[
  {
      "type":"postback",
      "title":"Products",
      "payload":"view_products"
    },
    {
      "type":"postback",
      "title":"My Account",
      "payload":"me"
    },
    
    {
      "type":"postback",
      "title":"My Cart",
      "payload":"my_cart"
    },
    {
      "type":"postback",
      "title":"My Orders",
      "payload":"user_orders"
    },
    {
      "type":"postback",
      "title":"Help",
      "payload":"help"
    }
  ]
}';
        $jsonGetStartBtn = '{
  "setting_type":"call_to_actions",
  "thread_state":"new_thread",
  "call_to_actions":[
    {
      "payload":"menu"
    }
  ]
}';

        $jsonWhitelist = '{
  "setting_type" : "domain_whitelisting",
  "whitelisted_domains" : ["' . secure_url('/') . '"],
  "domain_action_type": "add"
}';

        Boot::thread($jsonGetStartBtn, $pageId);
        Boot::thread($jsonGreeting, $pageId);
        Boot::thread($jsonMenu, $pageId);
        Boot::thread($jsonWhitelist, $pageId);


    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function siteSettings()
    {
        if (Auth::user()->type == "admin") {
            return view('siteSettings');
        } else {
            return view('errors.404');
        }

    }

    /**
     * @param Request $request
     * @return string
     */
    public function updateSiteSettings(Request $request)
    {
        try {
            SiteSettings::where('key', 'appId')->update([
                'value' => $request->appId
            ]);

            SiteSettings::where('key', 'appSec')->update([
                'value' => $request->appSec
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }

    //The following functions are for facebook pages settings
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pages()
    {
        $fb = new Facebook([
            'app_id' => self::getAppId(),
            'app_secret' => self::getAppSec(),
            'default_graph_version' => 'v2.6',
        ]);

        try {
            $permissions = ['pages_messaging', 'publish_actions', 'manage_pages', 'publish_pages'];
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl(secure_url('') . '/fbconnect', $permissions);
        } catch (\Exception $e) {
            $loginUrl = url('/');
        }

        $pages = FacebookPages::where('userId', Auth::user()->id)->get();
        return view('facebookPages', compact('pages', 'loginUrl'));
    }

    /**
     * @param $pageId
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function pagedetail($pageId)
    {
        $page = FacebookPages::where('userId', Auth::user()->id)->where('pageId', $pageId)->first();

        return view('fbPageDetail', compact('page'));
    }


    /**
     * @param Request $re
     * @return string
     */
    public function updateFbPage(Request $re)
    {
        $result = "";
        try {

            FacebookPages::where('pageId', $re->pageId)->update([
                'shopTitle' => $re->shopTitle,
                'shopSubTitle' => $re->shopSubTitle,
                'email' => $re->email,
                'phone' => $re->phone,
                'currency' => $re->currency,
                'paymentMethod' => $re->paymentMethod,
                'shipping' => $re->shipping,
                'afterOrderMsg' => $re->afterOrderMsg,
                'map' => $re->map,
                'tax' => $re->tax,
                'logo' => $re->logo,
                'phone' => $re->phone,
                'address' => $re->address,
                'paypalClientId' => $re->paypalClientId,
                'paypalClientSecret' => $re->paypalClientSecret,
                'mgApiKey' => $re->mgApiKey,
                'mgDomain' => $re->mgDomain,
                'mgEmail' => $re->mgEmail
            ]);

            if (PackagesController::isMyPackage('woo')) {
                FacebookPages::where('pageId', $re->pageId)->update([
                    'wpUrl' => $re->wpUrl,
                    'wooConsumerKey' => $re->wooConsumerKey,
                    'wooConsumerSecret' => $re->wooConsumerKey

                ]);
            }


            $result = "success";

        } catch (\Exception $e) {
            $result = $e->getMessage();
        }

        return $result;
    }

    /**
     * @param Request $request
     * @return string
     */
    public function changeTheme(Request $request)
    {
        $theme = strtolower($request->theme);
        try {
            User::where('id', Auth::user()->id)->update([
                'theme' => $theme
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public function deletePage(Request $request)
    {
        try {
            FacebookPages::where('userId', Auth::user()->id)->where('id', $request->pageId)->delete();
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }
    }

    public static function getAppId()
    {
        return \App\Settings::where('userId', Auth::user()->id)->value('appId');
    }

    public static function getAppSec()
    {
        return \App\Settings::where('userId', Auth::user()->id)->value('appSec');
    }

    public static function getToken()
    {
        return \App\Settings::where('userId', Auth::user()->id)->value('token');
    }


    public function updateSettings(Request $request)
    {

        try {
            \App\Settings::where('userId', Auth::user()->id)->update([
                'appId' => $request->fbAppId,
                'appSec' => $request->fbAppSec,
                'botStatus' => $request->botStatus,
                'token'=>$request->fbToken
            ]);
            return "success";
        } catch (\Exception $exception) {
            return $exception->getMessage();
        }

    }


    public function softwareSettings()
    {
        $fbAppId = self::getAppId();
        $fbAppSec = self::getAppSec();
        $fbToken = self::getToken();


        try {
            $fb = new Facebook([
                'app_id' => $fbAppId,
                'app_secret' => $fbAppSec,
                'default_graph_version' => 'v2.6',
            ]);
            $permissions = ['public_profile','pages_messaging', 'manage_pages', 'publish_pages', 'read_page_mailboxes'];
            $helper = $fb->getRedirectLoginHelper();
            $loginUrl = $helper->getLoginUrl(url('') . '/fbconnect', $permissions);
        } catch (\Exception $e) {
            $loginUrl = url('/');
        }

        return view('softwareSettings', compact('fbAppId', 'fbAppSec', 'loginUrl', 'fbToken'));

    }


    public function connect()
    {
        $fb = new Facebook([
            'app_id' => self::getAppId(),
            'app_secret' => self::getAppSec(),
            'default_graph_version' => 'v2.6',
        ]);


        try {
            $accessToken = \App\Settings::where('userId', Auth::user()->id)->value('token');
            $response = $fb->get('me/accounts', $accessToken);
            $body = $response->getBody();
            $data = json_decode($body, true);

            foreach ($data['data'] as $no => $filed) {
                if (!FacebookPages::where('pageId', $filed['id'])->exists()) {
                    $facebookPages = new FacebookPages();
                    $facebookPages->pageId = $filed['id'];
                    $facebookPages->pageName = $filed['name'];
                    $facebookPages->pageToken = $filed['access_token'];
                    $facebookPages->userId = Auth::user()->id;
                    $facebookPages->save();
                }


            }

        } catch (FacebookResponseException $e) {
            // When Graph returns an error
            return '[a] Graph returned an error: ' . $e->getMessage();

        } catch (FacebookSDKException $e) {
            // When validation fails or other local issues
            return '[a] Facebook SDK returned an error: ' . $e->getMessage();

        }


        $getProfileInfo = $fb->get('me?fields=picture,name', $accessToken)->getDecodedBody();
        $profilePic = $getProfileInfo['picture']['data']['url'];
        $name = $getProfileInfo['name'];
        User::where('id', Auth::user()->id)->update([
            'image' => $profilePic,
            'name' => $name
        ]);


        return redirect('settings/software');
    }

    public static function isEbotActive($userId)
    {
        if (\App\Settings::where('userId', $userId)->value('botStatus') == "active") {
            return true;
        } else {
            return false;
        }
    }


}
