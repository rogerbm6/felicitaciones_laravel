<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CatalogController extends Controller
{
  //listado
  public function getIndex()
  {
      return view('/catalog/index');
  }
  //getShow
  public function getShow($id)
  {
      return view('/catalog/show', ['id'=>$id]);
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
