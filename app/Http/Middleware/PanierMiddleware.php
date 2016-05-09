<?php

namespace App\Http\Middleware;

use App\Models\Panier;
use Auth;
use Closure;
use Debugbar;

class PanierMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //Vide la session, uniquement pour test
//        $request->session()->flush();

        //Récupère le panier actif de l'utilisateur s'il est connecté
        $panier_actif = Auth::check() ? Panier::where('client_id', Auth::user()->id)->where('panier_type_id', 1)->with('produits')->first() : null;

        //Pas de panier en session
        if(!$request->session()->has('panier')) {
            $panier = [
                'id' => null,
                'client_id' => null,
                'date_creation' => date('Y-m-d H:i:s'),
                'date_modification' => date('Y-m-d H:i:s'),
                'ip' => $request->ip(),
                'produits' => []
            ];

            //Ajout des données du panier actif de l'utilisateur s'il existe
            if($panier_actif && $panier_actif->count() !== 0) {
                $apnier['id'] = $panier_actif->id;
                $panier['client_id'] = Auth::user()->id;
                $panier['ip'] = $request->ip();
                $panier['produits'] = $panier_actif->produits;
            }
            //Ajoute le panier en session
            $request->session()->put('panier', $panier);
        }
Debugbar::info($request->session()->get('panier'));
        return $next($request);
    }
}
