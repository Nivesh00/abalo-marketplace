<?php

namespace App\Http\Controllers;

use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Write static login information to the session.
 * Use for test purposes.
 */
class AuthController extends Controller
{
    /*
    public function login(Request $request) {

        //$username = $request->input('username');
        $request->session()->put('abalo_user', 'Name');

        //$emailadresse = $request->input('emailadresse');
        $request->session()->put('abalo_mail', 'Email Address');

        $request->session()->put('abalo_time', time());

        return redirect()->route('haslogin');
    }

    public function logout(Request $request) {
        $request->session()->flush();
        return redirect()->route('haslogin');
    }


    public function isLoggedIn(Request $request) {
        if($request->session()->has('abalo_user')) {
            $r["user"] = $request->session()->get('abalo_user');
            $r["time"] = $request->session()->get('abalo_time');
            $r["mail"] = $request->session()->get('abalo_mail');
            $r["auth"] = "true";
        }
        else $r["auth"]="false";
        return response()->json($r);
    }
    */

    public function verify_login(Request $request)
    {
        $useremail = $request->input('useremail');
        $password = $request->input('password');

        $exist = DB::table('ab_user')->select()
            ->where('ab_mail', '=', $useremail)
            ->get()->toArray();


        if(sizeof($exist) || $useremail == 'user@email.de')
        {
            return redirect()->route('loggedin');
        }
        else
        {
            return view(
                'login_page',

                [
                    'loggin' => false,
                    'useremail' => $useremail,
                    'password' => $password
                ]
            );
        }
    }

    public function loggedin(Request $request)
    {
        $useremail = $request->input('useremail');
        $password = $request->input('password');

        $request->session()->put('user_email', $useremail);
        $request->session()->put('Auth', true);
        $request->session()->put('time', time());

        return view(

            'welcome',
            []
        );
    }

    public function logout(Request $request)
    {
        $request->session()->forget('Auth');
        $request->session()->forget('user_email');
        $request->session()->forget('time');

        return view(

            'welcome',
            []
        );
    }

}
