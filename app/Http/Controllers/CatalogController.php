<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class CatalogController extends Controller
{

  //listado
    public function getIndex()
    {
        $clientes = Cliente::all();
        //dd($clientes);
        return view('catalog/index', ['arrayClientes'=>$clientes]);
    }
    //getShow
    public function getShow($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('/catalog/show', ['cliente'=>$cliente]);
    }
    //getCreate
    public function getCreate()
    {
        return view('/catalog/create');
    }
    //getEdit
    public function getEdit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('/catalog/edit', ['cliente'=>$cliente]);
    }
}
