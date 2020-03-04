<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{

    public function html_email()
    {

        $clientes = DB::table('clientes')->whereMonth('fecha_nacimiento', date("n"))->whereDay('fecha_nacimiento', date("j"))->get();

        foreach ($clientes as $cliente) {
          $data = array('name'=> $cliente->nombre);

          Mail::send('mail', $data, function ($message) use($cliente){

              $message->to($cliente->correo, $cliente->nombre)->subject('FELIZ CUMPLEAÑOS!!!');
              $message->from(env('MAIL_USERNAME'), env('APP_NAME'));
          });
        }

    }
}
