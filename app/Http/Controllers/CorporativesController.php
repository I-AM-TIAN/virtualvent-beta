<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;
use Illuminate\Http\Request;

class CorporativesController extends Controller
{
    //funcion que lista todos los corporativos
    public function index()
    {
        $empresas = Corporativo::orderBy('razon_social', 'asc')->get();
        return response()->json($empresas);
    }

    public function show($url){
        $store = Corporativo::where('url', $url)->firstOrFail();
        return response()->json($store);
    }

    public function getIdByURL(Request $request)
    {
        $url = $request->query('url');
        $corporativo = Corporativo::where('url', $url)->first();

        if ($corporativo) {
            return response()->json(['id_corporativo' => $corporativo->id]);
        } else {
            return response()->json(['error' => 'No se encontró el corporativo'], 404);
        }
    }
}
