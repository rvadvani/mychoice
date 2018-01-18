<?php

namespace App\Http\Controllers\Authority\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:owner');
    }

    public function broker()
    {
        return Password::broker('owners');
    }

    public function showLinkRequestForm()
    {
        return view('authority.auth.passwords.email');
    }

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
        $response = $this->broker()->sendResetLink($request->only('email'));

        return $response == Password::RESET_LINK_SENT ? $this->sendResetLinkResponse($response) : $this->sendResetLinkFailedResponse($request, $response);
    }
}
