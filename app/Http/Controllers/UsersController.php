<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller {
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function register()
    {

        if (isset($_COOKIE['username']))
        {
            return redirect('/');
        }

        return view('register');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Symfony\Component\HttpFoundation\Response
     */
    public function doRegister(Request $request)
    {

        $username = $request->username;
        if (!empty($username))
        {

            $find_duplicate_user = User::where('username', $username)->first();
            if ($find_duplicate_user)
            {
                Session::flash('error', "Duplicate Username!");
                return Redirect::back();
            }
            $user = new User();
            $user->username = $username;

            if ($user->save())
            {
                $expire_time = time() + 60 * 60 * 24 * 30;
                setcookie('username', $username, $expire_time, "/");

                Session::flash('success', "Welcome, ".$username);

                return redirect('/');
            }
        }

        Session::flash('error', "Register Failed!");
        return response('error', 500);

    }

    public
    function logout()
    {
        $username = $_COOKIE['username'];
        setcookie('username', $username, 1, "/");

        return \redirect('/');

    }
}
