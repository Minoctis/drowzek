<?php

namespace App\Http\Controllers\Auth;

use App\Models\Client;
use App\Models\Panier;
use App\Models\PaniersHasProduits;
use Auth;
use Debugbar;
use Illuminate\Http\Request;
use Session;
use URL;
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

//    protected $loginView = "auth.connexion";

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
        $this->redirectTo = Session::get('url.intended');
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

    public function showLoginForm()
    {
        $view = 'auth.connexion';
        if (strpos(Session::get('url.intended'), 'checkout')) {
            $view = 'auth.connexion-checkout';
        }

        return view($view);
    }

    protected function authenticated() {
        if (Session::has('panier')) {
            $panier = Panier::where('panier_type_id', 1)->where('client_id', Auth::user()->id)->first();
            PaniersHasProduits::where('panier_id', $panier->id)->delete();
            foreach(Session::get('panier.produits_option') as $key => $option) {

                PaniersHasProduits::create([
                    'panier_id' => $panier->id,
                    'produit_option_id' => $option['produit_option_id']
                ]);
            }
            Session::put('panier.id', $panier->id);
        }
        Session::put('panier.client_id', Auth::user()->id);
        Session::has('panier.date_creation') ? Session::put('panier.date_creation', date('Y-m-d H:i:s')) : null;
        return redirect(Session::get('url.intended'));
    }
}
