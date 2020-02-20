<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

    public function postCreate(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            'nombre'            => 'required|max:45',
            'imagen'            => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'fecha_nacimiento'  => 'required|date',
            'correo'            => 'email| required'
        ]/*,  Mensajes personalizados ¡¡Alternativa!!
        [
            'required'        => 'Es necesario rellenar el campo :attribute',
            'nombre.max'      => 'El campo :attribute tiene como maximo :max caracteres',
            'imagen.mimes'    => 'El campo :attribute solo puede ser de tipos jpeg,png,jpg,gif',
            'imagen.image'    => 'El campo :attribute solo puede ser una imagen :mimes',
            'imagen.max'      => 'El campo :attribute solo puede ser una imagen de :max',
            'date'            => 'Es necesario rellenar el campo :attribute con una fecha',
            'correo.email'    => 'Es necesario rellenar el campo :attribute con un email valido'
        ] */);

        if ($validator->fails())
        {
          return redirect()->action('CatalogController@getCreate')->withErrors($validator)->withInput();
        }

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
