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
}
