<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;
use App\Models\Product;
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

    public function getProducts($url)
    {
        // Buscar la tienda por URL
        $store = Corporativo::where('url', $url)->first();

        // Verificar si la tienda existe
        if (!$store) {
            return response()->json(['error' => 'Store not found'], 404);
        }

        // Obtener los productos de la tienda
        $products = Product::where('corporativo_id', $store->id)->get();

        return response()->json($products);
    }

    
}
