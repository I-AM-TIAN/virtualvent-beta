<?php

namespace App\Http\Controllers;

use App\Models\Corporativo;
use Illuminate\Http\Request;

class CorporativesController extends Controller
{
    //funcion que lista todos los corporativos
    public function index()
    {
        $empresas = Corporativo::all();
        return response()->json($empresas);
    }
    
}
