<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest as UserLoginRequest;

use App\Http\Controllers\Controller;
use App\LoginRequest;
use App\User;

use Mail;
use App\Mail\LoginRequest as LoginRequestMail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    /**
     * LoginController constructor.
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Generate authentication link and send email.
     *
     * @param  \Illuminate\Http\UserLoginRequest $request
     * @return void
     */
    public function loginLink(UserLoginRequest $request)
    {
        $user = User::firstWhere('email', $request->email);
        if ($user) {
            $data = LoginRequest::create([
              'email' => $request->email,
              'token' => md5(rand(1, 10) . microtime()),
              'expired_at' => date('Y-m-d H:i:s',strtotime(env('LOGIN_EXPIRATION_TIME', 60).' minutes',strtotime(date('Y-m-d H:i:s'))))
            ]);

            Mail::to($user)->send(new LoginRequestMail($data));
            return response(["message" =>'mail sent!'], 200);
       } else {
            return response(["message" =>'User does not exist'], 422);
       }
    }

    /**
     * Authenticate user using token.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  string  $token
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request, $token)
    {
        $requestToken = LoginRequest::firstWhere('token', $token);
        if ($requestToken) {
            $requestToken->update(['is_used' => 1]);
            $user = User::firstWhere('email', $requestToken->email);
            foreach($user->tokens as $token) {
                $token->revoke();
            }
            $token = $user->createToken('Authentication Token')->accessToken;

            return response(['token' => $token], 200);
        } else {
            return response(["message" =>'invalid link'], 422);
       }
    }

    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response(['message' => 'Successfully logged out'], 200);
    }
}
