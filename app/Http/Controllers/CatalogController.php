<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\ClienteFormRequest;

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

    public function postCreate(ClienteFormRequest $request)
    {

        $id = DB::table('clientes')->insertGetId(
            ['nombre' => $request->input('nombre'),
          'fecha_nacimiento' => $request->input('fecha_nacimiento'),
          'correo' => $request->input('correo')]
        );


        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $cliente = Cliente::findOrFail($id);
                $extension = $request->file('imagen')->extension();
                $cliente ->imagen = $id.'.'.$cliente->nombre.'.'.$extension;
                $request->file('imagen')->storeAs(
                  'clientes',
                  $id.'.'.$cliente->nombre.'.'.$extension,
                  ['disk'=>'public']
              );
                $cliente->save();
            }
        }
        return redirect()->action('CatalogController@getIndex');
    }

    public function putDelete($id)
    {
        $cliente=Cliente::findOrFail($id);
        Storage::disk('public')->delete('clientes/'.$cliente->imagen);
        $cliente->delete();
        return redirect()->action('CatalogController@getIndex');
    }

    //getEdit
    public function getEdit($id)
    {
        $cliente=Cliente::findOrFail($id);
        return view('/catalog/edit', ['cliente'=>$cliente]);
    }

    public function putEdit(Request $request, $id)
    {
        $edit = Cliente::findOrFail($id);
        $edit ->nombre           = $request->input('nombre');
        $edit ->fecha_nacimiento = $request->input('fecha_nacimiento');
        $edit ->correo           = $request->input('correo');

        if ($request->hasFile('imagen')) {
            if ($request->file('imagen')->isValid()) {
                $extension = $request->file('imagen')->extension();
                //borrar
                Storage::disk('public')->delete('clientes/'.$edit->imagen);
                //database
                $edit->imagen = $edit->id.'.'.$edit->nombre.'.'.$extension;
                //server
                $request->file('imagen')->storeAs(
                  'clientes',
                  $edit->id.'.'.$edit->nombre.'.'.$extension,
                  ['disk'=>'public']
              );
            }
        }

        $edit -> save();
        return redirect()->action('CatalogController@getShow', ['id'=>$id]);
    }
}
