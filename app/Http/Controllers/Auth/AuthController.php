<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use Auth;
use Barryvdh\Debugbar\Middleware\Debugbar;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    protected $loginPath = '/connexion';

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    protected $registerView = "auth.creation-compte";

    protected $loginView = "auth.connexion";

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'civilite' => 'required|in:1,2',
            'prenom' => 'required',
            'nom' => 'required',
            'email' => 'required|email|max:255|unique:clients',
            'date-naissance' => 'date_format:Y-m-d',
            'password' => 'required|confirmed|min:6',
            'newsletter' => 'in:0,1'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $dateNaissance = $data['date-naissance'] ? date('Y-m-d',strtotime( $data['date-naissance'])) : null;

        return Client::create([
            'civilite_id' => $data['civilite'],
            'prenom' => $data['prenom'],
            'nom' => $data['nom'],
            'email' => $data['email'],
            'date_inscription' => time(),
            'date_naissance' => $dateNaissance,
            'password' => bcrypt($data['password'])
        ]);
    }

    public function logout() {
        Auth::guard($this->getGuard())->logout();
        return view('auth.deconnexion');
    }
}
