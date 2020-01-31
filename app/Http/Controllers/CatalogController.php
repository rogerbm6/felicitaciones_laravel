<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
  private $arrayClientes = [
       [
           'nombre' => 'Neo',
           'imagen' => 'https://img.gfx.no/2438/2438512/Cyber.jpg',
           'fecha_nacimiento' => '06/01/1972',
           'correo' => 'neo@matrix.org'
       ],
       [
           'nombre' => 'Morfeo',
           'imagen' => 'https://i.ytimg.com/vi/Us-rEFlYqDE/sddefault.jpg',
           'fecha_nacimiento' => '05/03/1997',
           'correo' => 'morfeo@matrix.org'
       ]
   ];
  //listado
  public function getIndex()
  {
     return view('catalog/index', ['arrayClientes'=>$this->arrayClientes]);
  }
  //getShow
  public function getShow($id)
  {
      return view('/catalog/show', ['cliente'=>$this->arrayClientes[$id]]);
  }
  //getCreate
  public function getCreate()
  {
      return view('/catalog/create');
  }
  //getEdit
  public function getEdit($id)
  {
      return view('/catalog/edit', ['id'=>$id]);
  }
}
